<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boutique | Compte</title>
  <meta name="description" content="Page de compte utilisateur">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
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
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- CSRF Token-->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    /* Styles personnalisés */
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

    .account-container {
      background-color: #f8f9fa;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: row;
      gap: 20px;
    }

    .user-info {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: #000000;
      font-weight: bold;
      max-width: 400px;
    }

    .button-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex: 1;
    }

    .btn-recycle {
      padding: 12px 20px;
      background-color: #dcb14a;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1rem;
      text-transform: uppercase;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
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
              <h1 class="h2 text-uppercase mb-0">Mon Compte</h1>
            </div>
            <div class="col-lg-6 text-lg-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                  <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Compte</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <!-- UTILISATEUR INFO SECTION -->
      @auth
      <br>
      <br>
      <section class="py-6">
        <div class="container">
          <div class="account-container">
            <!-- Informations de l'utilisateur -->
            <div class="user-info">
              <p>Nom : {{ auth()->user()->name }}</p>
              <p>Email : {{ auth()->user()->email }}</p>
              <p>Points accumulés : 300 pts</p>
              <p>Chaussures rendues : 3 paires</p>
            </div>
            <!-- Section avec texte explicatif et bouton -->
            <div class="button-section">
              <h2>Retourner des chaussures pour recyclage</h2>
              <p>Envoyez-nous vos chaussures abîmées pour qu'elles soient recyclées ou réutilisées.</br>
                 En échange, vous recevrez un bon de réduction sur votre prochain achat.</p>
              <a href="retour" class="btn-recycle">Retourner des chaussures</a>
            </div>
          </div>
        </div>
      </section>
      @endauth
    </div>
  </div>
  <br>
  <br>
  <br>
  @include('footer')

  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
