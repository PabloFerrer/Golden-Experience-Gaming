@extends('layouts.app')

@section('content')
    <form action="/action_page.php">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="name" class="form-control" id="name">
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="price" class="form-control" id="price">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="description" class="form-control" id="description">
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis:</label>
        <input type="synopsis" class="form-control" id="synopsis">
    </div>
    <div class="form-group">
        <label for="Genre">Genre: </label>
        <select name="ad" >
        <option selected>----</option>
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
    </div>
    <div class="form-group">
        <label for="synopsis">Synopsis:</label>
        <input type="synopsis" class="form-control" id="synopsis">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>

    
@endsection
