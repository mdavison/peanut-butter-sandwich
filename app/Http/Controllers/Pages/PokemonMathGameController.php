<?php

namespace App\Http\Controllers\Pages;

use App\Equation;
use App\Http\Controllers\Controller;
use App\Pokemon;
use Auth;
use Illuminate\Http\Request;

class PokemonMathGameController extends Controller
{
    public function index()
    {
        $equation = Equation::first();
        $pokemon = Pokemon::first();
        $user = Auth::user();
        $pokemonToLose = $pokemon;

        if ($user) {
            $pokemon = Pokemon::nextPokemonNotInCollection($user);
            $pokemonToLose = Pokemon::randomPokemonInCollection($user);
        }

        return view('pages.math-game', compact('equation', 'pokemon', 'pokemonToLose'));
    }

    public function show(Equation $equation)
    {
        $pokemon = Pokemon::random();
        $user = Auth::user();
        $pokemonToLose = $pokemon;

        if ($user) {
            $usersPokemon = $user->pokemon->sortBy('index')->last();
            if ($usersPokemon) {
                $pokemon = Pokemon::randomPokemonNotInCollection($user);
                $pokemonToLose = Pokemon::randomPokemonInCollection($user);
            }
        }

        return view('pages.math-game', compact('equation', 'pokemon', 'pokemonToLose'));
    }
}
