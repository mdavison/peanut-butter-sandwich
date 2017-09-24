<?php

namespace App\Http\Controllers\Pages;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PokemonTypingGameController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::where('index', 1)->first();
        $user = \Auth::user();

        if ($user) {
            $usersPokemon = $user->pokemon->sortBy('index')->last();
            if ($usersPokemon) {
                $nextPokemonIndex = Pokemon::nextPokemonIndex($usersPokemon->index, $user);
                $pokemon = Pokemon::where('index', $nextPokemonIndex)->first();
            }
        }

        return view('typing-game', compact('pokemon'));
    }

    public function show($pokemonIndex)
    {
        // Get pokemon by index
        $pokemon = Pokemon::where('index', $pokemonIndex)->first();

        return view('typing-game', compact('pokemon'));
    }
}
