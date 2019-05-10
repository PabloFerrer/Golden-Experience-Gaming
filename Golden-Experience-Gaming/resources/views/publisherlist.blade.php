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

    
    
    <select style="display: none;" name="publisherlist" id="publisherlist">
        @foreach($publishers as $publisher)
            <option style="display: none;" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
        @endforeach
    </select>
    
    
</div>

<h3>Lista de publishers :</h3>

    <table class="table table-striped" id="game-search-table">
    <tbody>
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
        </tr>
        @foreach($publishers as $publisher)
        <tr class="">
            <td>
            <p style="color:#FF0000" >{{ $publisher->id }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $publisher->name }}</p>
            </td>
            <td>
            
            <a href="/editpublisher/{{$publisher->id}}"> Editar </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection
