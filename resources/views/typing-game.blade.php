@extends('layouts.page')

@section('styles')
    <link rel="stylesheet" href="/css/typing.css">
@endsection

@section('content')
    <div class="container word-container">
        <div class="row">
            <div class="col">
                <img id="pokemon" src="/img/pokemon/pokeball.png" data-pokemon-to-appear="{{ $pokemon->image }}">
            </div>
            <div class="col">
                <h1 id="word-to-type">{{ ucfirst($pokemon->name) }}</h1>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="word-input" placeholder="Type {{ ucfirst($pokemon->name) }}">
                    </div>
                </form>
                <button type="button" class="btn btn-success invisible" id="next-word" data-next-word="{{ $pokemon->nextPokemonIndex($pokemon->index) }}">Next &gt;</button>

                <form action="/pokemon/user" method="post">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="pokemon" value="{{ $pokemon->id }}">
                        <input type="hidden" name="user" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                        <button type="submit" class="btn btn-primary" id="add">Add to Collection</button>
                    </div>
                </form>

            </div>
        </div><!-- /row -->
    </div>
@endsection

@section('scripts')
    <script src="/js/typing.js"></script>
@endsection