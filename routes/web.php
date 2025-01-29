<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [CartController::class, 'welcome']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');



Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');


Route::group(['middleware' => ['auth']], function () {

 
 Route::get('/detail', [CartController::class, 'detail']);
 Route::get('/checkout', [PaymentController::class, 'index'])->name('checkout');
 Route::get('/dashboard', [ProductController::class, 'index'])->name('products.index');
 Route::get('/compte', [ProductController::class, 'compte']);
 Route::get('/detail/{id}', [ProductController::class, 'show'])->name('products.show');
 Route::get('/search', [ProductController::class, 'search'])->name('products.search');
 Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
 Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
 // Routes pour mettre à jour et supprimer des produits du panier
 Route::post('/cart/update/{productId}', [CartController::class, 'updateCart'])->name('cart.update');
 Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
 Route::get('/retour', [RetourController::class, 'index']);
 Route::get('/retour', [RetourController::class, 'showRetourForm'])->name('retour.form');
 Route::post('/retour', [RetourController::class, 'storeRetour'])->name('retour.store');
 Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
// Route pour créer un paiement, en passant le montant total
 Route::get('/create-payment/{totalPrice}', [PaymentController::class, 'createPayment'])->name('payment.createPayment');

});

require __DIR__.'/auth.php';
