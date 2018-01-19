

@extends('layouts.skeleton')

@section('title', 'Compliance Centere Control')

@section('sidebar')
    @parent

@endsection

@section('content')

	<div class="wrapper">
		<div class="table-responsive">

			<h2>{{ Session::get('cc_name') }}</h2>
			<form action="/vin" method="POST">
				{{CSRF_field()}}
				<label>Year</label><input type="text" name="year">
				<label>Make</label><input type="text" name="make">
				<label>KM</label><input type="text" name="mk">
				<button type="submit" class="btn btn-primary">Vin Search</button>

			</form>
			<table class="table-hover table-responsive table-striped" width="100%" >
				<thead>
					<tr>
						<th>Code</th>
						<th>Customer</th>
						<th>Vehicle</th>
						<th>Chassis/VIN</th>
						<th>Vessel</th>
						<th>arrivaldate</th>
					</tr>
				</thead>

				@if(isset($carList))

					@foreach($carList as $car)
						<tr>
							<td>{{$car['consigneeid']}}</td>
							<td>{{$car['tradingname']}}</td>
							<td>{{$car['description']}}</td>
							<td>{{$car['chassis']}}</td>
							<td>{{$car['vessel']}}</td>
							<td><?php echo date('d/m/Y', strtotime($car['arrivaldate'])); ?></td>
						</tr>
					@endforeach
				@endif
				</select>
			</table>
		</div>
	</div>
@endsection







