<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
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
    public function index(){
        return view('auth.login');
    }
    // public function posts(Request $request)
    // {
    //     try {
    //         $this->validate(
    //             $request,
    //             [
    //                 'email' => 'email|exists:users,email',
    //                 'password' => 'required',

    //             ]
    //         );

    //         $attempts = [
    //             'email' => $request->email,
    //             'password' => $request->password,
    //         ];

    //         if (Auth::attempt($attempts)) {
    //             return redirect()->intended('home');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect('/')->with('error', 'Maaf email atau password yang anda masukkan salah, Silahkan login kembali!');
    //     }
    // }

    public function posts(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        }

        return redirect('/')
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah!');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
}
