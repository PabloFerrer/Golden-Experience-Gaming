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

    <form action="/editpublisher" method="GET">
    <div>Select a publisher to edit:</div>
    <select name="publisherlist" id="publisherlist">
        @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
        @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-default">Editar</button>
    <br>
    </form>
</div>
@endsection
