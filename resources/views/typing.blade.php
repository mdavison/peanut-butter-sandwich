@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="/css/typing.css">
@endsection

@section('content')
    <div class="container word-container">
        <div class="row">
            <div class="col">
                <img id="pokemon" src="/img/pokemon/pokeball.png" data-pokemon-to-appear="{{ $word->image }}">
            </div>
            <div class="col">
                <h1 id="word-to-type">{{ $word->word }}</h1>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="word-input" placeholder="Type {{ $word->word }}">
                    </div>
                </form>
                <button type="button" class="btn btn-success invisible" id="next-word" data-next-word="{{ $word->nextWordID($word->id) }}">Next &gt;</button>
            </div>
        </div><!-- /row -->
    </div>
@endsection

@section('scripts')
    <script src="/js/typing.js"></script>
@endsection