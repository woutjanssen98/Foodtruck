@extends('layout.main')

@section('content')
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Foodtruck</h1>
                <!--<h2 class="text-white-50 mx-auto mt-2 mb-5">ROC De Leijgraaf</h2>-->
                <!--<a href="#about" class="btn btn-primary js-scroll-trigger">Get Started</a>-->
            </div>
        </div>
    </header>
    <section id="login" class="about-section text-center">
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
    </section>
@endsection
