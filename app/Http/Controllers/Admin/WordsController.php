<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Word;
use App\Http\Controllers\Controller;

class WordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $words = Word::all();

        return view('admin.words.index', compact('words'));
    }

    public function show(Word $word)
    {
        return view('admin.words.show', compact('word'));
    }

    public function create()
    {
        return view('admin.words.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'word' => 'required|max:100',
            'image' => 'required'
        ]);

        Word::create(request(['word', 'image']));

        return redirect('/admin/words');
    }

    public function edit(Word $word)
    {
        return view('admin.words.edit', compact('word'));
    }

    public function update(Word $word)
    {
        // Just update the fields that changed
        if (!empty(request('word'))) {
            $word->word = request('word');
        }
        if (!empty(request('image'))) {
            $word->image = request('image');
        }

        $word->save();

        return redirect('/admin/words');
    }

    public function delete(Word $word)
    {
        return view('admin.words.delete', compact('word'));
    }

    public function destroy(Word $word)
    {
        $word->delete();

        return redirect('/admin/words');
    }
}
