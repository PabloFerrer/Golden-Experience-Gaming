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


    <h3>Here is the list of all the transactions:</h3>

    <table class="table table-striped textcolor" id="game-search-table">
    <tbody>
        <tr>
            <td>ID</td>
            <td>AMOUNT</td>
            <td>AGENTS</td>
            <td>GAMES</td>
        </tr>
        @foreach($transactions as $transaction)
        <tr class="">
            <td>
            <p style="color:#FF0000" >{{ $transaction->id }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{ $transaction->amount }}</p>
            </td>
            <td>
            <p style="color:#FF0000" >{{$transaction->buyer_id}}: {{ $transaction->user->name }}</p>
            </td>
            <td>
			@isset ($transaction->game->name)
				@if ($transaction->user->role == 1)
					<p style="color:#FF0000" >{{ $transaction->game_id }}: {{ $transaction->game->name }} (Client)</p>
				@else
					<p style="color:#FF0000" >{{ $transaction->game_id }}: {{ $transaction->game->name }} (Publisher)</p>
				@endif
			
			@else
					@if ($transaction->user->role == 1)
						<p style="color:#FF0000" >Client added money</p>
					@else
						<p style="color:#FF0000" >Publisher retrieved money</p>
					@endif
			@endisset
            </td>                        
            <td>
            </td>            
            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
