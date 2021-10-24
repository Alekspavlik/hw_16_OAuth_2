<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            $validateFields = $request->validate([
                'name' => 'required|unique:App\Models\User,name',
                'password' => 'required',
            ]);
            $user = User::create([
                'name' => $validateFields['name'],
                'password' => Hash::make($validateFields['password'])
            ]);
            if ($user) {
                Auth::login($user);
                return redirect()->route('home');
            }
            return back();
        }
        }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    }
