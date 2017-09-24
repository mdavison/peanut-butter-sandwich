@if (session('message'))
    <div class="alert alert-info" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('errors') && session('status'))
    <div class="alert alert-danger" role="alert">
        {{ session('status') }}
    </div>
@endif
