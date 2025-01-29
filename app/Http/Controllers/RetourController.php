<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;
use App\Models\Retour; // Assurez-vous d'avoir ce modèle importé

class RetourController extends Controller
{
    protected $apiService; 

    public function __construct(ApiService $apiService)  
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $cart = Session::get('cart', []);
        $subtotal = 0;

        // Calculer le nombre total d'articles dans le panier
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Récupérer les produits de l'API
        $products = $this->apiService->getProducts();
        $sneakers = [];

        // Extraire les noms des produits
        foreach ($products as $product) {
            $attributes = $product['attributes'] ?? [];
            if (isset($attributes['name'])) {
                $sneakers[] = $attributes['name'];
            }
        }

        return view('retour', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'totalQuantity' => $totalQuantity,
            'sneakers' => $sneakers
        ]);
    }

    public function showRetourForm()
    {
        // Récupérer les produits de l'API
        $products = $this->apiService->getProducts();
        $sneakers = [];

        // Extraire les noms des produits
        foreach ($products as $product) {
            $attributes = $product['attributes'] ?? [];
            if (isset($attributes['name'])) {
                $sneakers[] = $attributes['name'];
            }
        }

        // Retourner la vue avec la liste des produits
        return view('retour', ['sneakers' => $sneakers]);
    }

    public function storeRetour(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'etat' => 'required|string',
            'type' => 'required|string',
            'address' => 'required|string',
        ]);

        // Créer une nouvelle entrée dans la table 'retours'
        $retour = new Retour();
        $retour->nom = $request->input('nom');
        $retour->etat = $request->input('etat');  
        $retour->type = $request->input('type');
        $retour->address = $request->input('address');
        $retour->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Votre retour a bien été enregistré.');
    }
}
