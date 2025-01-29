<!DOCTYPE html>
<html>
<head>
    <title>{{ $product['title'] ?? 'Produit' }} | Boutique</title>
    <meta name="description" content="{{ $product['description'] ?? '' }}">
    <link rel="stylesheet" href="{{ asset('css1/style.default.css') }}">
</head>
<body>
    @include('header')

    <div class="container">
        <div class="row">
            <!-- IMAGE DU PRODUIT -->
            <div class="col-lg-6">
                <img src="{{ $product['image_url'] ?? asset('img/default.jpg') }}" class="img-fluid" alt="{{ $product['title'] }}">
            </div>

            <!-- DETAILS DU PRODUIT -->
            <div class="col-lg-6">
                <h1>{{ $product['title'] }}</h1>
                <p class="text-muted lead">{{ $product['price'] }}</p>
                <p class="text-sm mb-4">{{ $product['description'] }}</p>
                <a href="{{ $product['product_url'] }}" class="btn btn-dark" target="_blank">Voir sur Optical Factory</a>
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
