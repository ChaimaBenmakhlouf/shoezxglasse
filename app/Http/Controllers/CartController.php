<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
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

    //dd($cart); 
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
    $totalPrice = $subtotal;


    return view('cart', [
        'cart' => $cart,
        'subtotal' => $subtotal,
        'totalQuantity' => $totalQuantity,
        'totalPrice' => $totalPrice


    ]);
}
public function welcome()
{
    $cart = Session::get('cart', []);
    $subtotal = 0;

    // Calculer le nombre total d'articles dans le panier
    $totalQuantity = array_sum(array_column($cart, 'quantity'));

    //dd($cart); 
    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    return view('welcome', [
        'cart' => $cart,
        'subtotal' => $subtotal,
        'totalQuantity' => $totalQuantity

    ]);
}

    public function detail()
    {
        return view('detail');
    }

    public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer',
        'quantity' => 'required|integer|min:1',
    ]);

    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    $product = $this->apiService->getProductById($productId);
    $productData = $product['data'] ?? null;

    if (!$productData) {
        return response()->json(['message' => 'Produit non trouvé!'], 404);
    }

    $attributes = $productData['attributes'] ?? [];
    $cart = Session::get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        $cart[$productId] = [
            'id' => $productData['id'],
            'name' => $attributes['name'] ?? 'Nom inconnu',
            'price' => $attributes['retailPrice'] ?? 0,
            'quantity' => $quantity,
            'image' => $attributes['image']['original'] ?? 'default_image.jpg',
        ];
    }

    Session::put('cart', $cart);

    $newCartCount = array_sum(array_column(Session::get('cart', []), 'quantity'));

    return response()->json([
        'success' => true,
        'message' => 'Produit ajouté au panier!',
        'cartCount' => $newCartCount
    ]);
}

}