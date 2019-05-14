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

    
    <select style="display: none;" name="clientlist" id="clientlist">
        @foreach($clients as $client)
            <option style="display: none;" value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>


    <h3>Client's List :</h3> 

    <table class="table table-striped textcolor" id="game-search-table">
    <tbody>
        <tr>
            <td>ID</td>
            <td>NAME</td>
        </tr>
        @foreach($clients as $client)
        <tr class="">
            <td>
            <p style="color:#FF0000" >{{ $client->id }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $client->name }}</p>
            </td>
            <td>
            
            <a href="/editclient/{{$client->id}}"> Editar </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>



</div>
@endsection
