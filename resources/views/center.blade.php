

@extends('layouts.skeleton')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@section('title', 'Compliance Centere Control')

@section('sidebar')
    @parent

@endsection

@section('content')

		<div class="table-responsive">

			<h2>{{ Session::get('cc_name') }} - Coming Vehicles</h2>
			<form action="/cc_index" method="POST">
				{{CSRF_field()}}
				@if(count($vessels)>2)
				<label class="vesselSearch">Select a vessel</label>
					<select name="vesselID" id="vessel" class="vesselSearch">
						<option value="all" >All Vessels</option>
							@foreach($vessels as $vesselid=>$vessel)
								<option value={{ $vesselid }} {{$selectedID==$vesselid? "selected":""}} >{{ $vessel['vesselname'] }} - arriving {{ $vessel['arrivaldate'] }} </option>
						@endforeach
					</select>
				@endif
				<button type="submit" id="showVessel" class="btn btn-primary vesselSearch">Get List</button>
			</form>
			<table class="table-hover table-responsive table-striped" width="100%" id="table">
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
				</select>
			</table>
		</div>

@endsection



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
