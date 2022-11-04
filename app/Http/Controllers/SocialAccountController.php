<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAccountController extends Controller
{
    public function index($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $data = Socialite::driver($provider)->user();
        $credential = $this->findOrCreateUser($data, $provider);

        Auth::login($credential, true);
        return to_route("index");
    }

    private function findOrCreateUser($data, $provider)
    {
        if ($socialAccount = SocialAccount::where([
            'provider_id' => $data->getId(),
            'provider_name' => $provider
            ])->first()) {
            return $socialAccount->user;
        }

        $user = User::where('email', $data->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name'  => $data->getName(),
                'email' => $data->getEmail(),
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => now()
            ]);
        }

        $user->socialAccounts()->create([
            'provider_id'   => $data->getId(),
            'provider_name' => $provider
        ]);

        return $user;
    }
}
