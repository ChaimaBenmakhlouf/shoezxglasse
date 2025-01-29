<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // Supposons que le panier est stocké dans la session
        $cart = session('cart', []);

        // Calculer le montant total
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('checkout', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function createPayment(Request $request)
    {
        // Note : Cette méthode est à adapter selon l'API PayPal utilisée (Classic ou REST)
        $totalPrice = $request->input('totalPrice');

        // Configuration PayPal (remplace ces valeurs par tes propres informations)
        $paypalUrl = 'https://www.paypal.com/cgi-bin/webscr'; // URL de l'environnement de production
        $businessEmail = 'ton-email-paypal@example.com'; // Remplace par l'email associé à ton compte PayPal

        // Création d'une URL de redirection pour le paiement PayPal
        $returnUrl = route('payment.success'); // URL de succès après paiement
        $cancelUrl = route('payment.cancel'); // URL de retour après annulation

        // Génération du lien PayPal
        $paypalUrl .= '?cmd=_xclick';
        $paypalUrl .= '&business=' . urlencode($businessEmail);
        $paypalUrl .= '&amount=' . number_format($totalPrice, 2, '.', '');
        $paypalUrl .= '&currency_code=EUR';
        $paypalUrl .= '&return=' . urlencode($returnUrl);
        $paypalUrl .= '&cancel_return=' . urlencode($cancelUrl);
        $paypalUrl .= '&item_name=' . urlencode('Achat de produits');

        return redirect()->away($paypalUrl);
    }

    public function paymentSuccess()
    {
        // Logique de traitement après un paiement réussi
        return view('payment.success');
    }

    public function paymentCancel()
    {
        // Logique de traitement après une annulation de paiement
        return view('payment.cancel');
    }
}
