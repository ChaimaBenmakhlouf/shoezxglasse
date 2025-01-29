<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boutique | Ecommerce bootstrap template</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- SDK PayPal -->
  <script src="https://www.paypal.com/sdk/js?client-id=AV5YSLeuWgNwy8l3fiYyZVIHjgaBJBTp1lgGhnzyxm9Gt3hhngusuZ5qoFuJ03m654wuPRI0-ow68BA2&currency=EUR"></script>
</head>
<body>
  <div class="page-holder">
    <!-- navbar-->
    @include('header')
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1">
      <!-- Modal Content Here -->
    </div>
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Paiement</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a class="text-dark" href="dashboard">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <!-- BILLING ADDRESS-->
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <!-- ORDER SUMMARY-->
            <div class="bg-light rounded- p-4">
              <h3 class="h6 text-uppercase mb-3">Résumé de la commande</h3>
              <ul class="list-unstyled mb-0">
                @php
                  $totalQuantity = 0; // Initialiser la variable pour le total de la quantité
                  $totalOrderPrice = 0; // Initialiser la variable pour le prix total de la commande
                @endphp
                @if(isset($cart) && is_array($cart))
                  @foreach($cart as $item)
                    @php
                      $itemTotalPrice = $item['price'] * $item['quantity']; // Calculer le prix total de chaque produit
                      $totalQuantity += $item['quantity']; // Additionner la quantité de chaque produit
                      $totalOrderPrice += $itemTotalPrice; // Additionner le prix total de chaque produit
                    @endphp
                    <li class="d-flex align-items-center justify-content-between border-bottom py-2">
                      <!-- Afficher le nom du produit, la quantité, et le prix total de cette quantité -->
                      <span class="text-muted">{{ htmlspecialchars($item['name']) }} (x{{ $item['quantity'] }})</span>
                      <strong>{{ number_format($itemTotalPrice, 2, ',', ' ') }} €</strong>
                    </li>
                  @endforeach
                @endif
                <!-- Afficher le total de la quantité -->
                <li class="d-flex align-items-center justify-content-between border-bottom py-2">
                  <span class="text-muted">Total Quantité</span>
                  <strong>{{ $totalQuantity }}</strong>
                </li>
                <!-- Afficher le prix total de la commande -->
                <li class="d-flex align-items-center justify-content-between border-bottom py-2">
                  <span class="text-muted">Total</span>
                  <strong>{{ number_format($totalOrderPrice, 2, ',', ' ') }} €</strong>
                </li>
              </ul>
            </div>
            <!-- Conteneur du bouton PayPal -->
            <div id="paypal-button-container" class="mt-4"></div>
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
    <script src="js1/front.js"></script>
    <!-- Inclure le script PayPal -->
    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?= number_format($totalOrderPrice, 2, '.', '') ?>' // Remplacer par le montant total réel de la commande en format acceptable
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction réussie ! Merci ' + details.payer.name.given_name);
            // Rediriger vers une page de confirmation ou mettre à jour l'interface utilisateur
          });
        },
        onError: function(err) {
          // Gérer les erreurs
          console.error('Erreur de paiement:', err);
          alert('Une erreur est survenue lors du traitement de votre paiement.');
        }
      }).render('#paypal-button-container'); // Afficher le bouton dans le conteneur spécifié
    </script>
  </div>
</body>
</html>
