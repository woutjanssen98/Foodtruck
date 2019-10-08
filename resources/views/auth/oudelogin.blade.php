
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" >
    <title>login foodtruck</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/coreBootstrapLogin.css')}}" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" action="{{route('log-in')}}" method="POST">
    @csrf
    <img class="mb-3" src="img/leijgraaf-logo.png" alt="" width="300px">
    <h1 class="h3 mb-3 font-weight-normal">Log hier in alsjeblieft</h1>
    <label for="inputEmail" class="sr-only">Email adres</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email adres" required autofocus>
    <label for="inputPassword" class="sr-only">Wachtwoord</label>
    <input type="password" name="wachtwoord" id="wachtwoord" class="form-control" placeholder="Wachtwoord" required>
    <input type="submit">
    <!--<button class="btn btn-lg btn-primary btn-block" id="inloggen" type="submit">Log in</button>-->
</form>
</body>

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
