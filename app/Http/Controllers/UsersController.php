<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function showPokemon(User $user)
    {
        $pokemon = $user->pokemon;

        return view('users.pokemon', compact('pokemon'));
    }
}
