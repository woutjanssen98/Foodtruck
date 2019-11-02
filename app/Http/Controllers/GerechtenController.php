<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Gerecht;
use App\Http\GerechtAllergeen;
use App\Http\GerechtVertaling;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GerechtenController extends Controller
{

    public function toevoegen(Request $request){

//           if($request->hasFile('Foto')){
//               dd('hoi');
//           }
        try {

            $gerecht = new Gerecht();
            $gerecht->Prijs = $request->Prijs;
            $gerecht->created_at = Carbon::now('Europe/Amsterdam');
            $gerecht->updated_at = Carbon::now('Europe/Amsterdam');
            $gerecht->save();

            $gerechtNL = new GerechtVertaling();
            $gerechtNL->GerechtID = $gerecht->ID;
            $gerechtNL->TaalID = 1;
            $gerechtNL->Vertaling = $request->NaamGerechtNL;
            $gerechtNL->created_at = Carbon::now('Europe/Amsterdam');
            $gerechtNL->updated_at = Carbon::now('Europe/Amsterdam');
            $gerechtNL->save();

            $gerechtENG = new GerechtVertaling();
            $gerechtENG->GerechtID = $gerecht->ID;
            $gerechtENG->TaalID = 2;
            $gerechtENG->Vertaling = $request->NaamGerechtENG;
            $gerechtENG->created_at = Carbon::now('Europe/Amsterdam');
            $gerechtENG->updated_at = Carbon::now('Europe/Amsterdam');
            $gerechtENG->save();

            $allergenen = $request->Allergenen;
            foreach ($allergenen as $allergeen) {
                $Allergeen = new GerechtAllergeen();
                $Allergeen->GerechtID= $gerecht->ID;
                $Allergeen->AllergeenID = $allergeen;
                $Allergeen->created_at = Carbon::now('Europe/Amsterdam');
                $Allergeen->updated_at = Carbon::now('Europe/Amsterdam');
                $Allergeen->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'gerecht succesvol toegevoegd'
            ]);
        }catch (\Exception $exception){
            return response()->json([
            'success' =>false,
            'message' => $exception
            ]);
        }
    }

    public function verwijderen(Request $request){
        try {

            $gerecht = Gerecht::where('ID', $request->item)->first();
            $vertalingen = GerechtVertaling::where('GerechtID', $gerecht->ID)->get();
            $allergenen = GerechtAllergeen::where('GerechtID', $gerecht->ID)->get();
            foreach ($vertalingen as $vertaling) {
                $vertaling->delete();
            }
            foreach ($allergenen as $allergeen) {
                $allergeen->delete();
            }
            $gerecht->delete();
            return response()->json([
                'success' => true,
                'message' => 'succesvol verwijderd'
            ]);
        }catch(\Exception $exception){
            return response()->json([
                'success'=> false,
                'message'=>$exception
            ]);
        }
    }

    public function wijzigen(Request $request){
        $gerecht = Gerecht::where('ID', $request->GerechtID)->first();
        $gerecht->Prijs = $request->Prijs;
        $gerecht->updated_at = Carbon::now('Europe/Amsterdam');
        $gerecht->update();

        $gerechtNL = GerechtVertaling::where('GerechtID',$gerecht->ID)->where('TaalID',1)->first();
        $gerechtNL->Vertaling = $request->NaamGerechtNL;
        $gerechtNL->updated_at = Carbon::now('Europe/Amsterdam');
        $gerechtNL->update();

        $gerechtENG = GerechtVertaling::where('GerechtID',$gerecht->ID)->where('TaalID',2)->first();
        $gerechtENG->Vertaling = $request->NaamGerechtENG;
        $gerechtENG->updated_at = Carbon::now('Europe/Amsterdam');
        $gerechtENG->update();

        $allergenen = GerechtAllergeen::where('GerechtID', $gerecht->ID)->get();
        foreach ($allergenen as $allergeen) {
            $allergeen->delete();
        }

        $allergenenWijzigen = $request->AllergenenWijzigen;
        if($allergenenWijzigen !=''){
            foreach ($allergenenWijzigen as $allergeen) {
                $Allergeen = new GerechtAllergeen();
                $Allergeen->GerechtID= $gerecht->ID;
                $Allergeen->AllergeenID = $allergeen;
                $Allergeen->created_at = Carbon::now('Europe/Amsterdam');
                $Allergeen->updated_at = Carbon::now('Europe/Amsterdam');
                $Allergeen->save();
            }
        }

        return response()->json([
           'success' => true,
           'message' => 'succesvol gewijzigd'
        ]);
    }

    public function wijzigenModal(Request $request){
        $gerecht = Gerecht::where('ID', $request->Gerecht)->first();
        $ID = $gerecht->ID;
        $vertalingNL = GerechtVertaling::where('GerechtID',$gerecht->ID)->where('TaalID',1)->value('Vertaling');
        $vertalingENG = GerechtVertaling::where('GerechtID',$gerecht->ID)->where('TaalID',2)->value('Vertaling');
        $prijs= $gerecht->Prijs;
        return response()->json([
           'success'=> true,
           'ID'=>$ID,
           'vertalingNL'=>$vertalingNL,
           'vertalingENG'=>$vertalingENG,
           'prijs'=>$prijs
        ]);
    }
}
