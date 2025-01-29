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
                    <form method="POST" class="login100-form validate-form" action="{{ route('login') }}">
                        @csrf
                        <span class="login100-form-title p-b-43">
                            CONNEXION
                        </span>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input id="email" class="input100" type="email" name="email" :value="old('email')" required autofocus />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Email</span>
                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" type="password" id="password" name="password" required autocomplete="current-password" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">Mot de Passe</span>
                        </div>

                        <div class="flex-sb-m w-full p-t-3 p-b-32">
                            <div class="contact100-form-checkbox">
                                <input class="input-checkbox100" id="remember_me" type="checkbox" name="remember">
                                    <label class="label-checkbox100" for="remember_me">
                                        Remember me
                                    </label>
                            </div>

                            <div>
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Vous avez oublié votre mot de passe ?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="container-login100-form-btn">
                            <x-button class="login100-form-btn">
                                {{ __('Se Connecter') }}
                            </x-button>
                        </div>

                        <div class="text-center p-t-46 p-b-20">
                            <span class="txt2">
                                ou se connecter via
                            </span>
                        </div>

                        <div class="login100-form-social flex-c-m">
                            <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                <i class="fa fa-facebook-f" aria-hidden="true"></i>
                            </a>

                            <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                                <i class="fa fa-google" aria-hidden="true"></i>
                            </a>

                            <a href="#" class="login100-form-social-item flex-c-m bg3 m-r-5">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
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