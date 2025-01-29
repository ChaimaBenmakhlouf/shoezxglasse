@foreach ($products as $product)
    @php
        $attributes = $product['attributes'];
        $image = isset($attributes['image']['original']) ? $attributes['image']['original'] : 'default_image.jpg';
        $productId = isset($product['id']) ? $product['id'] : null; 
    @endphp
    <div class="col-md-4">
        <div class="card mb-4">
            <a href="{{ route('products.show', ['id' => $product['id']]) }}">
                <img src="{{ htmlspecialchars($image, ENT_QUOTES, 'UTF-8') }}" class="card-img-top" alt="{{ htmlspecialchars($attributes['name'], ENT_QUOTES, 'UTF-8') }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ htmlspecialchars($attributes['name'], ENT_QUOTES, 'UTF-8') }}</h5>
                <p class="card-text"><strong>Prix:</strong> {{ htmlspecialchars($attributes['retailPrice'], ENT_QUOTES, 'UTF-8') }} €</p>
                <center>
                <ul class="mb-0 list-inline">
                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a></li>
                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart">Ajouter au panier</a></li>
                    <li class="list-inline-item mr-0">
                        <a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"
                            data-image="{{ htmlspecialchars($image, ENT_QUOTES, 'UTF-8') }}"
                            data-name="{{ htmlspecialchars($attributes['name'], ENT_QUOTES, 'UTF-8') }}"
                            data-price="{{ htmlspecialchars($attributes['retailPrice'], ENT_QUOTES, 'UTF-8') }}"
                            data-description="{{ htmlspecialchars($attributes['description'] ?? 'Description pas disponible', ENT_QUOTES, 'UTF-8') }}"
                            data-rating="{{ $attributes['rating'] ?? 0 }}">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                </ul>
                </center>
            </div>
        </div>
    </div>
@endforeach
