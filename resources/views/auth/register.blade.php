<x-auth-card>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <title>Boutique | Ecommerce Produits Locaux</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css2/util.css">
        <link rel="stylesheet" type="text/css" href="css2/main.css">
        <!--===============================================================================================-->
    </head>

    <body style="background-color: #666666;">
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                        @csrf
                        <span class="login100-form-title p-b-43">
                            INSCRIPTION
                        </span>

                        <div class="wrap-input100 validate-input">
                            <x-input id="name" class="input100" type="text" name="name" :value="old('name')" required />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Nom</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <x-input id="email" class="input100" type="email" name="email" :value="old('email')" required />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Email</span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <x-input class="input100" type="password" id="password" name="password" required autocomplete="new-password" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Mot de Passe</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <x-input class="input100" id="password_confirmation" type="password" name="password_confirmation" required />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Confirmation</span>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-32">
                            <div>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Vous avez déjà un compte ?') }}
                                </a>
                            </div>
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="container-login100-form-btn">
                            <x-button class="login100-form-btn">
                                {{ __('Inscription') }}
                            </x-button>
                        </div>

                    </form>
                    <div class="login100-more" style="background-image: url('img/sn22.jpg');">
                    </div>
                </div>
            </div>
        </div>

        <!--===============================================================================================-->
        <script src="vendor1/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor1/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor1/bootstrap/js/popper.js"></script>
        <script src="vendor1/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor1/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor1/daterangepicker/moment.min.js"></script>
        <script src="vendor1/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor1/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js2/main.js"></script>

    </body>

    </html>
</x-auth-card>