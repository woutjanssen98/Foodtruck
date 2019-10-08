<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Gerecht;
use App\Http\GerechtAllergeen;
use App\Http\Drankje;
use App\Http\DrankjeAllergeen;
use App\Http\Werknemer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $layout = 'layouts.main';

	public function index()
		{
            //kijkt welke naam de route naar de index pagina heeft om de taal van de site te bepalen.
            $routeName = Request::route()->getName();

            //roept functie taalkeuze aan.
            $taalkeuze = $this->taalkeuze($routeName);

            //roept functie gerechten aan.
            $gerechten = $this->gerechten($taalkeuze);

            //roept functie drankjes aan.
            $drankjes =  $this->drankjes($taalkeuze);

            //roept functie werknemers aan.
            $werknemers = $this->werknemers();

            //zet taal gelijk aan de route naam zodat het menu en de statische content goed weergegeven kan worden
            $taal = $routeName;
            return view('index/index',compact("taal",'gerechten','drankjes','werknemers'));
		}

        public function taalkeuze($routenaam){
	    //de taalkeuze word aangepast aan het ID dat een taal heeft in de database zodat alle queries hier op aangepast kunnen worden.
            if($routenaam =='NL'){
                $taalkeuze = '1';
            }elseif ($routenaam=='ENG'){
                $taalkeuze = '2';
            }else{
                //stel er gaat iets mis en de routenaam word niet opgehaald dan word alles nog gewoon weergegeven in het nederlands
                $taalkeuze = '1';
            }
            return $taalkeuze;
        }

		public function gerechten($taalkeuze)
        {
            //alle gerechten worden opgehaald uit de database
            $gerechten = Gerecht::join('gerecht_vertaling',function ($join) use ($taalkeuze) {
                $join->on('gerechten.ID','=', 'gerecht_vertaling.GerechtID')->where('TaalID', '=', $taalkeuze);
            })->get();

            // roept de functie gerechten_allergenen aan om de allergenen in het gerecht op te halen uit de database
            $this->gerechten_allergenen($gerechten,$taalkeuze);
	        return $gerechten;
        }

        public function gerechten_allergenen($gerechten,$taalkeuze)
        {
            //gaat alle gerechten 1 voor 1 af
            foreach ($gerechten as $gerecht){
                // haalt alle allergenen op die gekoppeld zijn aan het gerecht.
                $allergeen = GerechtAllergeen::where('GerechtID', $gerecht->GerechtID)->join('allergeen_vertaling', function ($join) use ($taalkeuze){
                    $join->on('gerechten_allergenen.AllergeenID','=','allergeen_vertaling.AllergeenID')->where('TaalID','=', $taalkeuze);
                })->get();

                //lege string die vervolgens gebruikt word om alle allergenen op een rijtje te zetten met de juiste vertaling.
                $allergenen='';
                foreach ($allergeen as $Allergeen){
                    $vertaling = $Allergeen->Vertaling;
                    $allergenen = $vertaling.', '.$allergenen;
                }

                //kijkt of de variabel allergenen nog steeds leeg is. zo niet dan word deze gevuld met de melding dat het gerecht geen allergenen bevat.
                if($allergenen !=''){
                    $gerecht->allergenen = $allergenen;
                }else{
                    if($taalkeuze == '1'){
                        $gerecht->allergenen = 'Dit gerecht bevat geen allergenen';
                    }else{
                        $gerecht->allergenen = 'This dish does not contain any allergenes';
                    }
                }
            }
        }

        public function drankjes($taalkeuze){
	        //alle drankjes worden opgehaald uit de database met de juiste vertaling
            $drankjes = Drankje::join('dranken_vertaling', function ($join) use ($taalkeuze){
            $join->on('dranken.ID', '=', 'dranken_vertaling.DrankID')->where('TaalID', '=', $taalkeuze);})->get();

            //roept de functie drankjes_allergenen aan om de allergenen in het drankje op te halen uit de database.
            $this->drankjes_allergenen($drankjes,$taalkeuze);
            return $drankjes;
        }

        public function  drankjes_allergenen($drankjes,$taalkeuze){
	        //gaat alle drankjes 1 voor 1 af.
	        foreach ($drankjes as $drankje){
                // haalt alle allergenen op die gekoppeld zijn aan het drankje.
                $allergeen = DrankjeAllergeen::where('DrankID', $drankje->DrankID)->join('allergeen_vertaling', function ($join) use ($taalkeuze){
                    $join->on('dranken_allergenen.AllergenenID','=','allergeen_vertaling.AllergeenID')->where('TaalID','=',$taalkeuze);
                })->get();

                //lege string die vervolgens gebruikt word om alle allergenen op een rijtje te zetten met de juiste vertaling.
                $allergenen='';
                foreach ($allergeen as $Allergeen){
                    $vertaling = $Allergeen->Vertaling;
                    $allergenen = $vertaling.', '.$allergenen;
                }

                //kijkt of de variabel allergenen nog steeds leeg is. zo niet dan word deze gevuld met de melding dat het drankje geen allergenen bevat.
                if($allergenen !=''){
                    $drankje->allergenen = $allergenen;
                }else{
                    if($taalkeuze == '1'){
                        $drankje->allergenen = 'Dit drankje bevat geen allergenen';
                    }else{
                        $drankje->allergenen = 'This drink does not contain any allergenes';
                    }
                }
            }
        }

        public function werknemers(){
	        //alle werknemers van de foodtruck worden opgehaald uit de database
	        $werknemers = Werknemer::get();
	        return($werknemers);
        }
}
