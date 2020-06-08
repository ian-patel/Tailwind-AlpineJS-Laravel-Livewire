<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login page view
     *
     * @return void
     */
    public function index()
    {
        return view('pages.login');
    }

    /**
     * Redirect to social website.
     *
     * @param Request $request
     * @param string $provider
     * @return Response
     */
    public function redirectToProvider(Request $request, string $provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            return redirect()->to('/');
        }
    }

    /**
     * Redirect callback.
     *
     * @param Request $request
     * @param string $provider
     * @return Response
     */
    public function handleProviderCallback(Request $request, string $provider)
    {
        if ($request->has('denied')) {
            return redirect()->to('/');
        }

        try {
            $providerUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->to('/');
        }

        $user = User::updateOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ],
            [
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'username' => $providerUser->getNickname(),
                'avatar' => $providerUser->getAvatar(),
                'provider_token' => $providerUser->token,
                'provider_token_secret' => $providerUser->tokenSecret ?? null,
                'location' => $providerUser->user['location'] ?? null,
                'description' => $providerUser->user['description'] ?? $providerUser->user['bio'] ?? null,
            ]
        );

        Auth::login($user, true);

        return redirect()->to('/');
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
