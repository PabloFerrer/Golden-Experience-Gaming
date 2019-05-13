@extends('layouts.app')

@section('content')
<div class="py-4">
    @if (session('notification'))
    <div class="alert alert-success">
    {{ session('notification') }}
    </div>
    @endif


    @if (count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
    @endif

    <form action="/editclient" method="GET">
    <div>Select a client to edit:</div>
    <select name="clientlist" id="clientlist">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-default">Editar</button>
    <br>
    </form>
</div>
@endsection
