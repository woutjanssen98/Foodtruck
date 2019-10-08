@extends('layout.main')

@section('content')
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">{{$taal}}</h2>
                    @if($taal == 'NL')
                        <p class="text-white-50">
                            Interview met Stefan Hoeijmakers, horeca-docent
                            De foodtruck is opgericht zodat leerlingen de theorie kunnen toe passen in de praktijk. Verschillende leerlingen zetten een heel project op door naar locaties te gaan en door menu’s te verzinnen. De Foodtruck rijdt naar braderieën of open dagen om de faciliteiten van een foodtruck te laten zien. Ook doen de leerlingen dan aan live cooking. Zij staan met 2 mensen in de truck om gerechtjes te bereiden en er staan 6 tot 8 leerlingen die gerechtjes uitdelen en met mensen praten.
                            De Foodtruck staat het hele jaar door op verschillende locaties. Leerlingen kunnen een inbreng doen over een locatie waarbij ROC De Leijgraaf kijkt naar of een voorgestelde locatie nuttig is. De Foodtruck staat niet op festivals e.d. omdat het een non-profit organisatie is. ROC De Leijgraaf krijgt vaak vergoeding van evenementen waar de Foodtruck komt te staan, van deze vergoeding kunnen leerlingen gerechten maken.
                            Omdat leerlingen zelf gerechten verzinnen, passen zij deze ideeën toe op verschillende thema’s die passen bij het evenement waar de Foodtruck naar toe gaat. Verschillende thema’s zijn; duurzaam, senioren, “hip”, het seizoen, vegan e.d..
                            Tevens is het een vorm van promotie voor ROC De Leijgraaf.

                        </p>
                    @elseif($taal =='ENG')
                        <p class="text-white-50">
                            An Interview with Stefan Hoeijmakers, a teacher in the catering industry.
                            The food truck was set up for the students to be able to apply the theory they are taught. Students can set up projects which allow them to go to different locations and come up with unique menu’s as well. The food truck drives to fairs or open days to promote the school and show off the skills they have been taught. The students also do live cooking at these locations. There are usually 2 people in the truck while a bigger group of about 6-8 students hand out the dishes and talk to people.
                            The food truck is available at many different locations throughout the year. Students can propose a location they think the truck should go and the school decides if that is a good idea or not. The food truck doesn’t go to festivals because it’s a non-profit organization. ROC de Leijgraaf is often reimbursed for events where the truck will be located. With this reimbursement the students can prepare dishes.
                            Because students make up their own dishes, they are able to apply certain ideas and themes to match the event the food truck is going to. Examples of themes might be; Sustainable, the current season, vegan, etc.
                            This is a way for students to use their skills and also as a promotion for ROC de Leijgraaf.


                        </p>
                    @endif
                </div>
            </div>
            <img src="img/ipad.png" class="img-fluid" alt="">
        </div>
    </section>
@endsection
