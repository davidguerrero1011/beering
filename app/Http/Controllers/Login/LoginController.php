<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use App\Models\Roles;
use App\Models\Sessions;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Login.Login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validateLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            Sessions::create([
                'user_id'          => Auth::user()->id,
                'ip_address'       => $request->ip(),
                'operative_system' => $request->header('User-Agent'),
                'start_date'       => now()->format('Y-m-d'),
                'end_date'         => null
            ]);

            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Las credenciales no son validas'])->withInput($request->only('email', 'remember'));
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
            $user = Auth::user();
            Sessions::where('user_id', $user->id)->update(['end_date' => now()]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('message', 'Sesión finalizada, te esperamos de nuevo');

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->getEmail())->first();
            $roleDefault = Roles::where('name', 'Clientes')->first();

            if (!$existUser) {
                $user = User::create([
                    'name'      => $googleUser->getName(),
                    'email'     => $googleUser->getEmail(),
                    'password'  => bcrypt('1234567890'),
                    'city_id'   => 58,
                    'role_id'   => $roleDefault->id,
                    'google_id' => $googleUser->getId()
                ]);

                Sessions::create([
                    'user_id'          => $user->id,
                    'ip_address'       => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'],
                    'operative_system' => request()->header('User-Agent'),
                    'start_date'       => now()->format('Y-m-d'),
                    'end_date'         => null
                ]);

            } else {
                $user = $existUser;
            }

            Auth::login($user);
            return redirect()->intended('home');

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect('/login')->withErrors(['error' => 'Hubo algún error intentando loguearse con google, si tiene credenciales, intentelo con el login normal']);
        }
    }
}
