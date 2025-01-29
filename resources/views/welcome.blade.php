<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Boutique | Ecommerce Produits Locaux</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css1/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css1/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
</head>

<body>
    <div class="page-holder">
        <!-- navbar-->
        @include('header')
        <!-- HERO SECTION-->
        <div class="container">
            <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/cinq.png)">
                <div class="container py-5">
                    <div class="row px-4 px-lg-5">
                        <div class="col-lg-6">
                            <p class="text-muted small text-uppercase mb-2">SHOEZER, VOTRE MAGASIN EN LIGNE </p>
                            <h1 class="h2 text-uppercase mb-3">100% QUALITÉ <br> & FIABILITÉ</h1>
                            @if (Route::has('login'))
                                    @auth
                                       <a class="btn btn-dark" href="{{ url('/dashboard') }}">
                                       RETOUR MENU
                                    </a>
                                    @else
                                    <a class="btn btn-dark" href="{{ route('login') }}">
                                    </i>REGOIGNEZ-NOUS
                                    </a>
                                    @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- CATEGORIES SECTION-->
            <section class="pt-5">
                <header class="text-center">
                    <p class="small text-muted small text-uppercase mb-1">COLLECTIONS SHOEZER</p>
                    <h2 class="h5 text-uppercase mb-4">PARCOUREZ NOS CATÉGORIES</h2>
                </header>
                <div class="row">
                    <div class="col-md-4"><a class="category-item" href="dashboard">
                    <img class="img-fluid" src="img/sn1.jpg" alt="" />
                    <strong class="category-item-title">Nike</strong></a>
                    <br>
                    <a class="category-item" href="dashboard">
                    <img class="img-fluid" src="img/sn2.jpg" alt="" />
                    <strong class="category-item-title">Adidas</strong>
                    </a>
                    </div>
                    <div class="col-md-4"><a class="category-item mb-4" href="dashboard">
                    <img class="img-fluid" src="img/sn3.jpg" alt="" /><strong class="category-item-title">Reebok</strong></a>
                    <a class="category-item" href="dashboard">
                    <img class="img-fluid" src="img/sn4.jpg" alt="" />
                    <strong class="category-item-title">Puma</strong>
                    </a>
                    </div>
                    <div class="col-md-4"><a class="category-item" href="dashboard"><img class="img-fluid" src="img/sn5.jpg" alt="" /><strong class="category-item-title">New Balance</strong></a>
                    <br>
                    <a class="category-item" href="dashboard">
                    <img class="img-fluid" src="img/sn6.png" alt="" />
                    <strong class="category-item-title">Converse</strong></a>
                    </div>
                </div>
            </section>
            <!-- TRENDING PRODUCTS-->
            <br>
            <!-- SERVICES-->
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row text-center gy-3">
                        <div class="col-lg-4">
                            <div class="d-inline-block">
                                <div class="d-flex align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#delivery-time-1"> </use>
                                    </svg>
                                    <div class="text-start ms-3">
                                        <h6 class="text-uppercase mb-1">LIVRAISON GRATUITE</h6>
                                        <p class="text-sm mb-0 text-muted">Livraison gratuite à Paris</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-inline-block">
                                <div class="d-flex align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#helpline-24h-1"> </use>
                                    </svg>
                                    <div class="text-start ms-3">
                                        <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                                        <p class="text-sm mb-0 text-muted">Livraison gratuite à Paris</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-inline-block">
                                <div class="d-flex align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#label-tag-1"> </use>
                                    </svg>
                                    <div class="text-start ms-3">
                                        <h6 class="text-uppercase mb-1">FESTIVAL OFFERS</h6>
                                        <p class="text-sm mb-0 text-muted">Livraison gratuite</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- NEWSLETTER-->
            <section class="py-5">
                <div class="container p-0">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <h5 class="text-uppercase">SOYONS AMIS !</h5>
                            <p class="text-sm text-muted mb-0">Rejoignez-nous rapidement.</p>
                        </div>
                        <div class="col-lg-6">
                            <form action="#">
                                <div class="input-group">
                                    <input class="form-control form-control-lg" type="email" placeholder="Entrer votre Adresse-email" aria-describedby="button-addon2">
                                    <button class="btn btn-dark" id="button-addon2" type="submit">S'abonner</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @include('footer')
        <!-- JavaScript files-->
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/glightbox/js/glightbox.min.js"></script>
        <script src="vendor/nouislider/nouislider.min.js"></script>
        <script src="vendor/swiper/swiper-bundle.min.js"></script>
        <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="js/front.js"></script>
        <script>
            // ------------------------------------------------------- //
            //   Inject SVG Sprite - 
            //   see more here 
            //   https://css-tricks.com/ajaxing-svg-sprite/
            // ------------------------------------------------------ //
            function injectSvgSprite(path) {

                var ajax = new XMLHttpRequest();
                ajax.open("GET", path, true);
                ajax.send();
                ajax.onload = function(e) {
                    var div = document.createElement("div");
                    div.className = 'd-none';
                    div.innerHTML = ajax.responseText;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                }
            }
            // this is set to BootstrapTemple website as you cannot 
            // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
            // while using file:// protocol
            // pls don't forget to change to your domain :)
            injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
</body>

</html>