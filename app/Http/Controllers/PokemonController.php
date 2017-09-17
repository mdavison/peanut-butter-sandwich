<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Pokemon::get(['index', 'name', 'image']);
    }

    public function storeUser()
    {
        $this->validate(request(), [
            'pokemon' => 'required',
            'user' => 'required'
        ]);

        // Make sure the user is the currently logged in user
        if (Auth::user()->id != request('user')) {
            return back();
        }

        $pokemon = Pokemon::find(request('pokemon'));
        $user = User::find(request('user'));

        // Find out if user already has this pokemon
        if ($user->hasPokemon($pokemon->id)) {
            return back();
        }

        if (!empty($pokemon) && !empty($user)) {
            $pokemon->users()->save($user);
        }

        return back();
    }
}
