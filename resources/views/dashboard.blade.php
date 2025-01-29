<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Lunettes</title>
    <link rel="stylesheet" href="{{ asset('css1/style.default.css') }}">
</head>
<body>
    @include('header')

    <div class="container">
        <h1>Catalogue des Lunettes</h1>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                        <img src="{{ $product['image_url'] ?? asset('img/no-image.jpg') }}" 
     class="card-img-top" 
     alt="{{ $product['title'] }}">                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['title'] }}</h5>
                            <p class="card-text"><strong>Prix:</strong> {{ $product['price'] }}</p>
                            <a href="{{ route('products.show', ['id' => $product['id']]) }}" class="btn btn-dark">Voir le produit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')
</body>
</html>
