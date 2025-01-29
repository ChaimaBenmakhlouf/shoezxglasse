<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boutique | Retour et Recyclage</title>
  <meta name="description" content="Retour des chaussures pour recyclage">
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
  <style>
    /* Style pour les notifications Toastr */
    .toast-success {
      background-color: #dcb14a;
      color: white;
    }
    .toast-error {
      background-color: #dcb14a;
      color: white;
    }
    .toast-title {
      font-weight: bold;
    }

    /* Section Retour */
    .return-container {
      background-color: #f8f9fa;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .return-title {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: #343a40;
    }

    .return-description {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: #6c757d;
    }

    .return-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .return-form input,
    .return-form select {
      padding: 10px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      width: 100%;
    }

    .return-form button {
      padding: 12px 20px;
      background-color: #dcb14a;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1rem;
      text-transform: uppercase;
      font-weight: bold;
    }

    .return-form button:hover {
      background-color: #b08d35;
    }

    /* Style des alertes */
    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 4px;
    }

    .alert-success p {
      margin: 0;
    }

    .breadcrumb-item a {
      text-decoration: none;
      color: #6c757d;
    }
  </style>
</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    @include('header')

    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Retour & Recyclage</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Retour</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- RETOUR SECTION -->
      <section class="py-5">
        <div class="container p-0">
          <div class="return-container">
            <h2 class="return-title">Retournez vos chaussures abîmées</h2>
            <p class="return-description">
              Aidez-nous à réduire l'empreinte carbone en recyclant vos chaussures usagées. En retour, vous recevrez un bon de réduction pour vos futurs achats !
            </p>

            <form class="return-form" action="{{ route('retour.store') }}" method="POST">
              @csrf
              <label for="nom">Sélectionnez le modèle de chaussure :</label>
              <select id="nom" name="nom" required>
                @foreach($sneakers as $sneaker)
                  <option value="{{ $sneaker }}">{{ $sneaker }}</option>
                @endforeach
              </select>

              <label for="etat">Etat des chaussures :</label>
              <input type="text" id="etat" name="etat" placeholder="Exprimez vous" required>

              <label for="type">Choisissez le type de retour :</label>
              <select id="type" name="return_type" required>
                <option value="pickup">Je souhaite qu'on vienne récupérer les chaussures</option>
                <option value="post">Je vais envoyer les chaussures par la poste</option>
              </select>

              <label for="address">Votre adresse (si vous avez choisi la récupération) :</label>
              <input type="text" id="address" name="address" placeholder="Votre adresse" required>

              <button type="submit">Envoyer et Recevoir mon Bon</button>
            </form>
            <!-- Example Success Message -->
            <div class="alert-success mt-4" style="display:none;">
              <p>Merci pour votre retour ! Vous recevrez bientôt votre bon de réduction.</p>
            </div>
          </div>
        </div>
      </section>
    </div>

    @include('footer')
  </div>

  <script>
    document.querySelector('.return-form').addEventListener('submit', function(e) {
      e.preventDefault();
      // Simulate success message
      toastr.success('Retour enregistré ! Vous recevrez bientôt un bon de réduction.', 'Succès');
    });
  </script>
  <!-- jQuery (required by Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(session('success'))
    toastr.success('{{ session('success') }}');
  @endif
</script>
</body>

</html>
