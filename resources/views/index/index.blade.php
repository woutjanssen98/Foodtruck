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

    <section id="over" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    @if($taal == 'NL')
                        <h2 class="text-white mb-4">Interview met Stefan Hoeijmakers</h2>
                        <h3 class="text-white mb-5">horeca-docent</h3>
                        <p class="text-white-50">
                            De foodtruck is opgericht zodat leerlingen de theorie kunnen toe passen in de praktijk. Verschillende leerlingen zetten een heel project op door naar locaties te gaan en door menu’s te verzinnen. De Foodtruck rijdt naar braderieën of open dagen om de faciliteiten van een foodtruck te laten zien. Ook doen de leerlingen dan aan live cooking. Zij staan met 2 mensen in de truck om gerechtjes te bereiden en er staan 6 tot 8 leerlingen die gerechtjes uitdelen en met mensen praten.
                            De Foodtruck staat het hele jaar door op verschillende locaties. Leerlingen kunnen een inbreng doen over een locatie waarbij ROC De Leijgraaf kijkt naar of een voorgestelde locatie nuttig is. De Foodtruck staat niet op festivals e.d. omdat het een non-profit organisatie is. ROC De Leijgraaf krijgt vaak vergoeding van evenementen waar de Foodtruck komt te staan, van deze vergoeding kunnen leerlingen gerechten maken.
                            Omdat leerlingen zelf gerechten verzinnen, passen zij deze ideeën toe op verschillende thema’s die passen bij het evenement waar de Foodtruck naar toe gaat. Verschillende thema’s zijn; duurzaam, senioren, “hip”, het seizoen, vegan e.d..
                            Tevens is het een vorm van promotie voor ROC De Leijgraaf.

                        </p>
                    @elseif($taal =='ENG')
                        <h2 class="text-white mb-4">An Interview with Stefan Hoeijmakers</h2>
                        <h3 class="text-white mb-5">a teacher in the catering industry.</h3>
                        <p class="text-white-50">
                            The food truck was set up for the students to be able to apply the theory they are taught. Students can set up projects which allow them to go to different locations and come up with unique menu’s as well. The food truck drives to fairs or open days to promote the school and show off the skills they have been taught. The students also do live cooking at these locations. There are usually 2 people in the truck while a bigger group of about 6-8 students hand out the dishes and talk to people.
                            The food truck is available at many different locations throughout the year. Students can propose a location they think the truck should go and the school decides if that is a good idea or not. The food truck doesn’t go to festivals because it’s a non-profit organization. ROC de Leijgraaf is often reimbursed for events where the truck will be located. With this reimbursement the students can prepare dishes.
                            Because students make up their own dishes, they are able to apply certain ideas and themes to match the event the food truck is going to. Examples of themes might be; Sustainable, the current season, vegan, etc.
                            This is a way for students to use their skills and also as a promotion for ROC de Leijgraaf.


                        </p>
                    @endif
                </div>
            </div>

        </div>
    </section>

    <!-- Projects Section -->
    <section id="gerechten" class="projects-section bg-light">
        <div class="container">
            <button class="btn-primary nieuwGerecht">Nieuw gerecht</button>
            <?php $positie = 'links'?>
            @foreach($gerechten as $gerecht)
                @if($positie =='links')
                <div class="row justify-content-center no-gutters mb-5 mb-lg-0" style="margin-bottom: 1rem;">
                    <div class="col-lg-6">
                        <img class="img-fluid" src="img/gerechten/{{$gerecht->GerechtID}}.jpg" style="width:100%; height: 100%; " alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">{{$gerecht->Vertaling}}</h4>
                                    <h8 class="text-white">€{{$gerecht->Prijs}}</h8>
                                    <p class="mb-0 text-white-50">@if($taal=='NL')Allergenen: @else Allergenes: @endif {{$gerecht->allergenen}}</p>
                                    <hr class="d-none d-lg-block mb-0 ml-0">
                                    <button type="button" class="btn btn-primary wijzigen" value="{{$gerecht->GerechtID}}">Wijzigen</button>
                                    <button type="button" class="btn btn-danger verwijderen" value="{{$gerecht->GerechtID}}">Verwijderen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php $positie = 'rechts'?>
                @elseif($positie =='rechts')
                    <div class="row justify-content-center no-gutters" style="margin-bottom: 1rem;">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="img/gerechten/{{$gerecht->GerechtID}}.jpg" style="width:100%; height: 100% " alt="">
                        </div>
                        <div class="col-lg-6 order-lg-first">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-right">
                                        <h4 class="text-white">{{$gerecht->Vertaling}}</h4>
                                        <h8 class="text-white">€{{$gerecht->Prijs}}</h8>
                                        <p class="mb-0 text-white-50">@if($taal=='NL')Allergenen: @else Allergenes: @endif {{$gerecht->allergenen}}</p>
                                        <hr class="d-none d-lg-block mb-0 mr-0">
                                        <button type="button" class="btn btn-primary wijzigen" value="{{$gerecht->GerechtID}}">Wijzigen</button>
                                        <button type="button" class="btn btn-danger verwijderen" value="{{$gerecht->GerechtID}}">Verwijderen</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $positie = 'links'?>
                @endif
            @endforeach
        </div>
    </section>

    <section id="drankjes" class="projects-section bg-light">
        <div class="container">
            @foreach($drankjes as $drankje)
                @if($positie == 'links')
                    <div class="row justify-content-center no-gutters mb-5 mb-lg-0" style="margin-bottom: 1rem;">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="img/Drankjes/{{$drankje->DrankID}}{{$drankje->Extensie}}" style="width:100%; height: 100%; " alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-left">
                                        <h4 class="text-white">{{$drankje->Vertaling}}</h4>
                                        <h8 class="text-white">€{{$drankje->Prijs}}</h8>
                                        <p class="mb-0 text-white-50">@if($taal=='NL')Allergenen: @else Allergenes: @endif {{$drankje->allergenen}}</p>
                                        <hr class="d-none d-lg-block mb-0 ml-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $positie = 'rechts'?>
                @elseif($positie =='rechts')
                    <div class="row justify-content-center no-gutters" style="margin-bottom: 1rem;">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="img/Drankjes/{{$drankje->DrankID}}{{$drankje->Extensie}}" style="width:100%; height: 100% " alt="">
                        </div>
                        <div class="col-lg-6 order-lg-first">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-right">
                                        <h4 class="text-white">{{$drankje->Vertaling}}</h4>
                                        <h8 class="text-white">€{{$drankje->Prijs}}</h8>
                                        <p class="mb-0 text-white-50">@if($taal=='NL')Allergenen: @else Allergenes: @endif {{$drankje->allergenen}}</p>
                                        <hr class="d-none d-lg-block mb-0 mr-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $positie = 'links'?>
                @endif
            @endforeach

        </div>
    </section>
    <section id="werknemers" class="projects-section bg-light">
        <div class="container">
            @foreach($werknemers as $werknemer)
                @if($werknemer->ID % 2 == 0)
                    <div class="row justify-content-center no-gutters mb-5 mb-lg-0" style="margin-bottom: 1rem;">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="img/Werknemers/{{$werknemer->ID}}{{$werknemer->Foto}}" style="width:50%; height: 50%; " alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-left">
                                        <h4 class="text-white">{{$werknemer->Naam}}</h4>
                                        <p class="mb-0 text-white-50"></p>
                                        <hr class="d-none d-lg-block mb-0 ml-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center no-gutters" style="margin-bottom: 1rem;">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="img/Werknemers/{{$werknemer->ID}}{{$werknemer->Foto}}" style="width:15rem; height: 15rem;" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto text-center text-lg-left">
                                        <h4 class="text-white">{{$werknemer->Naam}}</h4>
                                        <p class="mb-0 text-white-50"></p>
                                        <hr class="d-none d-lg-block mb-0 ml-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>


    <!-- Signup Section -->
    <section id="signup" class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">

                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>

                    <form class="form-inline d-flex">
                        <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Enter email address...">
                        <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">hello@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section>
@endsection
