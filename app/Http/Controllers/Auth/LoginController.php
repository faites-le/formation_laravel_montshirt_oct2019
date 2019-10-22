<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginMonTshirt(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])) {
            // Récupérer l'utilisateur connecté
            $user = Auth::user();
            if($user->hasRole('Administrateur')) {
//                return route(redirect('backend_homepage'));
                // Si le user est admin > redirection vers le backend
                return redirect()->route('backend_homepage');
            } else {
                // Si le user n'est pas admin
                return redirect()->route('homepage');
            }
        } else {
            return redirect()->route('login')->with('messages','impossible de vous identifier');
        }
    }

    public function loginProcess(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])) {
            $user = Auth::user();
//            if($user->hasRole('Acheteur')) {
                return redirect()->route('commande_adresse');
//            }
        }
        else {
            return redirect()->route('commande_identification')
                ->with('notice','impossible de vous identifier');
        }
    }
}
