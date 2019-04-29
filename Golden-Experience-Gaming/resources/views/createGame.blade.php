@extends('layouts.app')

@section('content')
    
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
    <form action="/creategame/finished" method="POST">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" value="" name="name">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="int" class="form-control" id="price" value="" name="price">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description" id="description" value="">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis:</label>
        <input type="text" class="form-control" id="synopsis" value="" name="synopsis">
    </div>

    <!--    LO COMENTO HASTA QUE SEPA COMO IMPLEMENTAR ESTA MOVIDA
        <div class="form-group">
        <label for="Genre">Genre: </label>
        <select name="ad" >
        <option selected></option>
                <option value="G2">RPG</option>
        <option value="G3">FPS</option>
        <option value="G4">TPS</option>
        <option value="G5">Horror</option>
        <option value="G6">Sci-fi</option>
        <option value="G7">Medieval</option>
        <option value="G8">Modern</option>
        <option value="G9">Post-Apocaliptic</option>
        <option value="G10">Grand-Strategy</option>
        <option value="G11">RTS</option>
        <option value="G12">Puzzle</option>
        </select>
        <button type="submit" onclick="">Añadir Genero</button>
    </div>-->
    <div class="form-group">
        <label for="genre">Genre:</label>
        <input type="text" class="form-control" id="genre" value="" name="genre">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>

    
@endsection
