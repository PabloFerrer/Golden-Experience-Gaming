@extends('layouts.app')

@section('content')
<div class="salescontent">
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

	<h2>Informe de ventas totales</h2>
	@isset( $bestselling->name )
		<h3>Juego mejor vendido: {{$bestselling->name}}</h3>
	@else
		<h3>Aún no se ha vendido ningún juego</h3>
	@endisset
	<table style="width:100%">
		<tr>
			<th>Date</th>
			<th>Amount</th>
			<th>User</th>
			<th>Game</th>
		</tr>
		@foreach ( $salesreport  as $report) 
			<tr>
				<th>{{ $report->created_at }}</th>
				<th>{{ $report->amount }}</th>
				<th>{{ $report->username }}</th>
				<th>{{ $report->gamename }}</th>		
			</tr>
		@endforeach
	</table>
	
</div>

@endsection
