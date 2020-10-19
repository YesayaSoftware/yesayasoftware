<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'provider_id' => $githubUser->getId(),
        ], [
            'name' => $githubUser->getName(),
            'email' => $githubUser->getEmail(),
            'profile_photo_path' => $githubUser->getAvatar(),
        ]);
        
        Auth::login($user, true);

        return redirect('dashboard');
    }
}