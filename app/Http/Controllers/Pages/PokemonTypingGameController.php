<?php

namespace App\Http\Controllers\Pages;

use App\Pokemon;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonTypingGameController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::where('index', 1)->first();
        $user = Auth::user();

        if ($user) {
            $pokemon = Pokemon::nextPokemonNotInCollection($user);
        }

        return view('pages.typing-game', compact('pokemon'));
    }

    public function show($pokemonIndex)
    {
        // Get pokemon by index
        $pokemon = Pokemon::where('index', $pokemonIndex)->first();

        return view('pages.typing-game', compact('pokemon'));
    }
}
