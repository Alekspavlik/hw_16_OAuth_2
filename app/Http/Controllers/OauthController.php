<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OauthController
{
    public function callback(Request $request)
    {
        $response = Http::asForm()->post('https://api.dropboxapi.com/oauth2/token', [
            'code' => $request->get('code'),
            'grant_type' => 'authorization_code',
            'client_id' => config('oauth.dropbox.app_key'),
            'client_secret' => config('oauth.dropbox.app_secret'),
            'redirect_uri' => config('oauth.dropbox.redirect_uri'),
        ]);
       $token = $response->json('access_token');

       $response = Http::withHeaders([
           'Authorization' => 'Bearer ' . $token
       ])->send('post', 'https://api.dropboxapi.com/2/users/get_current_account', []);


        $user = User::updateOrCreate(
            ['name' => $response->json('name.display_name')],
            ['password' => Hash::make(Str::random(10))]);

        Auth::login($user);
            return redirect()->route('home');
    }
}

