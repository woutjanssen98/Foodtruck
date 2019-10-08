<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login(Request $request){
        // nog werkend maken zodat je niet word uitgelogd naar redirect. Hash::check+Auth::login of Auth::attempt maken geen verschil voor t resultaat.
        $user = User::where('Email',$request->email)->first();

        $wachtwoord = $request->wachtwoord;
        //dd($user->Wachtwoord);
        if(Hash::check($wachtwoord,$user->Wachtwoord)){
           Auth::login($user);

           if (Auth::check()){
            return redirect('/');
           }
        }
        return back();
//
//
//
//        if (Auth::attempt([
//            'email' => $request->Email,
//            'password' => $request->Wachtwoord])
//        ){
//            dd('hoi');
//            return redirect('/NL');
//        }else{
//        return response()->json([
//            'success'=> false,
//            'message'=> 'inloggen niet gelukt'
//        ]);}
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function index()
    {
        //laad de inlog pagina
        $taal = 'NL';
        return view('auth/login',compact('taal'));
    }
}
