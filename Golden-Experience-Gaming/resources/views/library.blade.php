@extends('layouts.app')

@section('content')

  <div class="container-flow py-4">

    @for($i = 0; $i < count($usergames); $i++)
      @if ($i % 2 == 0)
        <div class="row library-row">
      @endif

        <div class="col-md-1">
            <img src="{{env('IMAGE_SERVER')}}{{$usergames[$i]->icon_url}}" class="library-logo">
        </div>
        <div class="col-md-2">
            <h3 class="library-title">{{ $usergames[$i]->name }}</h3>
        </div>
        <div class="col-md-3">
            <p class="library-code"></p>Game Redeem Code goes here
        </div>

      @if ($i % 2 == 1)
        </div>
      @endif
    @endfor
  </div>

@endsection
