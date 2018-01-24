

@extends('layouts.skeleton')

@section('title', 'Compliance Centere Control')

@section('sidebar')
    @parent

@endsection

@section('content')

<div class="vin_search">
	<h2>{{ Session::get('cc_name') }}  - Vin Search</h2>
	<hr/>

	@include('flash::message')
	<form class="form-group" action="search" method="POST">
		{{ CSRF_field()}}
		<div class="form-group">
			<label>Customer Name <small>(Required)</small></label>
			<br>
			<select name="Consigneeid" required="" id="Consigneeid" class="form-control">

				<option value="">Select Customer </option>
					@foreach(Session::get('activeCustomers') as $customer)
				  			<option value="{{$customer}}">{{ $customer}}</option>
			  		@endforeach
			</select>

		</div>


		<div class="form-group">
			<label>Enter Vin Number </label>

			<input type="text" name="Vin_number" class="form-control" placeholder="Enter vin number...">
		</div>


		<small>Can't find by vin? find using the below filter</small>
		<span class="glyphicon glyphicon-chevron-down" id="chevron"></span>


		<div class="filter_options">
			<div class="form-group filteredSearch">

				<div class="search_options" >
					<div class="form-group">
						<label>Make </label>
						<input type="text" name="Make" 	 class="form-control" 	 placeholder="Enter Make" 	value="{{old('Make')}}">
					</div>
					<div class="form-group">
						<label>Model 	</label><br>
						<input type="text" name="Model"  class="form-control" 	placeholder="Enter Model" 		value="{{old('Model')}}"><br>
					</div>
					<div class="form-group">

						<label>Year</label><br>
						<input type="text" name="Year"  class="form-control"  	placeholder="Enter Year" 		value="{{old('Year')}}" ><br>
					</div>
					<div class="form-group">
						<label>KM</label><br>
						<input type="text" name="KM" 	 class="form-control" 	placeholder="Enter KM" 			value="{{old('KM')}}"><br>
					</div>
					<div class="form-group">
						<label>VehicleID</label><br>
						<input type="text" name="VehicleID" class="form-control" 	placeholder="Enter VehicleID"   value="{{old('VehicleID')}}" ><br>
					</div>
				</div>

			</div>

		</div>

		<div class="search_button text-center">
			<button class="btn btn-primary" id="submit">Search</button>

		</div>
	</form>








	<div id="car">

		<h1>Match found</h1>

	</div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">


$(document).ready(function()
{

$("#car").hide();
	$('.filter_options').hide();
	$('#chevron').click(function()
	{
		$('.filter_options').toggle();
		if($( "#chevron" ).hasClass( "glyphicon-chevron-down" ))
			$('#chevron').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		else
			$('#chevron').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');



	});

});

</script>


<script type="text/javascript">





// $(document).ready(function() {
// 	var alertOnce = false;
//    $( ".vin_search_input" ).focus(function() {


//    	console.log('yes its focused');

//    	$('.vin_search_input').on('input', function()
//    	{
// 		    var vin = $('.vin_search_input').val();
//    			var Consigneeid = $('#Consigneeid').val();
//    			if(vin.length==17 && Consigneeid!='')
//    			{

//    				$.post('search',{'Vin_number':vin,'Consigneeid':Consigneeid,  "_token": "{{ csrf_token() }}",}, function(data)
//    				{
//    					$("#car").show();
//    					if(alertOnce===false)
//    					{
//    						alertOnce= true;
//    						var html = "";
//    						var res = JSON.parse(data);
// html= "<form action='update' method='POST'>";
// html+= '<input type="text" name="_token" value="{{csrf_token()}}" >';

// html+= "<table class='table table-striped'>";
// html += "<thead>";
// html += "<th>Mark<th>";
// html += "<th>Make<th>";
// html += "<th>Model<th>";
// html += "<th>Year<th>";
// html += "<th>KM<th>";
// html += "<th>Colour<th>";
// html += "<th>Chassis<th>";
// html += "<th>Compliance Centre<th>";
// html += "<th>Vin<th>";



// html += "</thead>";
// html += "<tbody>";
// html += "<tr>";
// 	html += "<td>"+ res.mark + "<td>";
// 	html += "<td>"+ res.make + "<td>";
// 	html += "<td>"+ res.model + "<td>";
// 	html += "<td>"+ res.year + "<td>";
// 	html += "<td>"+ res.km + "<td>";
// 	html += "<td>"+ res.colour + "<td>";
// 	html += "<td>"+ res.chassis + "<td>";
// 	html += "<td>"+ res.deregreleasedto + "<td>";
// 	// html += "<td>"+ res.vin + "<td>";

// 	html+=  '<input type="text" name="new_vin" value="'+res.vin+'">';
// 	html+=  '<button type="submit" > Update</button>';
// html += "</tr>";
// html += "</tbody>";
// html += "</table>";
// html+= "</form>";

// 	   					$("#car").append(html);
// 	   					alert('loaded data' + data);
//    					}
//    				});

//    			}
//    			console.log(vin.length);
// 	});

//     });
// });



</script>



@endsection




