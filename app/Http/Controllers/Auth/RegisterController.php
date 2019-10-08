<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Wachtwoord' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Email' => $data['Email'],
            'Wachtwoord' => Hash::make($data['Wachtwoord']),
        ]);
    }

    public function opslaan(Request $request){
        //functie die gebruikt word om een nieuwe gebruiker aan te maken voor de website.
        $gebruiker = new User();
        if (User::where('Email', '=', $request->Email)->count() == 0) {
            $gebruiker->Email = $request->Email;
            $gebruiker->Wachtwoord = Hash::make($request->Wachtwoord);
            $gebruiker->created_at = Carbon::now('Europe/Amsterdam');
            $gebruiker->updated_at = Carbon::now('Europe/Amsterdam');
            $gebruiker->save();
            return response()->json([
                'success' => true,
                'message' => 'gebruiker succesvol aangemaakt'
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> 'Deze mail is al in gebruik'
            ]);
        }

    }
}
