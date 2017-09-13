<?php

namespace App\Http\Controllers\Pages;

use App\Word;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WordsController extends Controller
{
    public function index()
    {
        $word = Word::first();

        return view('typing', compact('word'));
    }

    public function show(Word $word)
    {
        return view('typing', compact('word'));
    }
}
