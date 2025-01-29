<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $products = $this->apiService->getScrapedProducts();
        return view('dashboard', ['products' => $products]);
    }

    public function show($id)
    {
        $product = $this->apiService->getProductById($id);

        if (!$product) {
            abort(404);
        }

        return view('detail', ['product' => $product]);
    }
}
