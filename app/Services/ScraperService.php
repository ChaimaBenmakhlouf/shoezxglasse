<?php

namespace App\Services;

use Goutte\Client;

class ScraperService
{
    protected $baseUrl = 'https://www.opticalfactory.fr/eshop/';

    public function scrapeProducts()
    {
        $client = new Client();
        $crawler = $client->request('GET', $this->baseUrl);

        $products = [];

        $crawler->filter('.jet-woo-products__item')->each(function ($node) use (&$products, $client) {
            $title = $node->filter('.jet-woo-product-title a')->text();
            $productLink = $node->filter('.jet-woo-product-title a')->attr('href');
            $imageUrl = $node->filter('.attachment-woocommerce_thumbnail')->count() > 0
            ? $node->filter('.attachment-woocommerce_thumbnail')->attr('src')
            : null;             $price = $node->filter('.woocommerce-Price-amount')->text();

            // Récupérer les détails de la page produit
            $productDetails = $this->getProductDetails($client, $productLink);

            $products[] = [
                'id' => md5($productLink),
                'title' => trim($title),
                'price' => trim($price),
                'image_url' => trim($imageUrl),
                'description' => $productDetails['description'],
                'faq_info' => $productDetails['faq_info'],
                'product_url' => $productLink
            ];
        });

        return $products;
    }

    private function getProductDetails($client, $url)
    {
        $crawler = $client->request('GET', $url);

        $description = $crawler->filter('.elementor-widget-text-editor')->count() ? 
            $crawler->filter('.elementor-widget-text-editor')->text() : 'Description non disponible';

        $faqInfo = $crawler->filter('.eael-adv-accordion')->count() ? 
            $crawler->filter('.eael-adv-accordion')->text() : 'Aucune FAQ disponible';

        return [
            'description' => $description,
            'faq_info' => $faqInfo
        ];
    }
}
