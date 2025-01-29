<?php

namespace App\Services;

class ApiService
{
    protected $scraperService;

    public function __construct(ScraperService $scraperService)
    {
        $this->scraperService = $scraperService;
    }

    public function getScrapedProducts()
    {
        return $this->scraperService->scrapeProducts();
    }

    public function getProductById($id)
    {
        $products = $this->scraperService->scrapeProducts();
        return collect($products)->firstWhere('id', $id);
    }
}
