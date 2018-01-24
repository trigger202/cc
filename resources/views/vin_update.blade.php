

@extends('layouts.skeleton')

@section('title', 'Compliance Centere Control')

@section('sidebar')
    @parent

@endsection

@section('content')

<div class="wrapper">

	<div class="row">
		@isset($car)
			<h2>Match Found</h2>
			<table class="table table-responsive">
					<thead>
						<tr>
							<th>Consigneeid</th>
							<th>vehicleid</th>
							<th>Make</th>
							<th>Model</th>
							<th>Year</th>
							<th>KM</th>
							<th>Colour</th>
							<th>compliance Center</th>
							<th>Vin</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<form action="/update" method="POST">
								{{ CSRF_field() }}

								<td> {{ $car['mark'] }}</td>
								<td> {{ $car['vehicleid'] }}</td>
								<td> {{ $car['make'] }}</td>
								<td> {{ $car['model'] }}</td>
								<td> {{ $car['year']}}</td>
								<td> {{ $car['km']}}</td>
								<td> {{ $car['colour']}}</td>
								<td> {{ $car['deregreleasedto']}}</td>
								<!-- hidden fields -->
								<input type="hidden" name="vehicleid" value="{{$car['vehicleid']}}">
								<input type="hidden" name="mark" value="{{$car['mark']}}"> </td>
								<input type="hidden" name="chassis" value="{{$car['chassis']}}">

								<td>
									<input type="text" name="new_vin" value="{{$car['vin']}}">
									<button type="submit" class="btn btn-primary" >Save</button>
								</td>
							</form>

						</tr>

					</tbody>

			</table>

		</div>
		@endisset
	</div>

@endsection









