@extends('layouts.page')

@section('styles')

@endsection

@section('content')
    <h1>My Pokemon</h1>

    <hr>

    @if (!empty($pokemon))
        <div class="row">
        @foreach ($pokemon as $item)
        <div class="col">
            <div class="card" style="width: 475px;">
                <img class="card-img-top" src="/img/pokemon/{{ $item->image }}" alt="Card image cap" height="475" width="475">
                <div class="card-body">
                    <h4 class="card-title">{{ ucfirst($item->name) }}</h4>
                </div>
            </div>
        </div>
        @endforeach
        </div><!-- /.row -->
    @endif

@endsection

@section('scripts')

@endsection