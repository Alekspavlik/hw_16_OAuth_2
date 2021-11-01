<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::orderBy('id', 'desc')->paginate(5);
        return view('ads.index', compact('ads'));
    }

    public function show($id)
    {
        $ad = Ads::find($id);
        return view('ads.show', compact('ad'));
    }

    public function create(Ads $ads = null)
    {
        if (isset($ads) && !Auth::user()->can('update', $ads)) {
            return redirect()->route('home');
        }
        return view('ads.form', compact('ads'));
    }

    public function save(Request $request, Ads $ads = null)
    {
        if (isset($ads) && !Auth::user()->can('update', $ads)) {
            return redirect()->route('home');
        }
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data['user_id'] = Auth::id();

        Ads::updateOrCreate(['id' => $ads->id ?? null], $data);
        return redirect()->route('home');
    }

    public function delete(Ads $ads)
    {
        if (!Auth::user()->can('delete', $ads)) {
            return redirect()->route('home');
        }
        $ads->delete();
        return redirect()->route('home');
    }
}
