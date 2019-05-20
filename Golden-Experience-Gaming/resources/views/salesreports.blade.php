@extends('layouts.app')

	@section('content')
	<div class="py-4 salescontent">
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
		<table class="table table-striped" id="sales-table">
			<tr>
				<th scope="col">Date</th>
				<th scope="col">Amount</th>
				<th scope="col">User</th>
				<th scope="col">Game</th>
			</tr>
			@foreach ( $salesreport  as $report)
				<tr>
					<td>{{ $report->created_at }}</td>
					<td>{{ $report->amount }}</td>
					<td>{{ $report->username }}</td>
					<td>{{ $report->gamename }}</td>
				</tr>
			@endforeach
		</table>

	</div>

	@endsection
