

@extends('layouts.skeleton')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@section('title', 'Compliance Centere Control')

@section('sidebar')
    @parent

@endsection

@section('content')

	<div class="table-responsive">

		<h2>{{ Session::get('cc_name') }} - Customers</h2>

		<table class="table-hover table-responsive table-striped" width="100%" id="table">
			<thead>
				<tr>
					<th>Code</th>
					<th>Companyname</th>
					<th>Tradingname</th>
					<th>Address</th>
					<th>tel</th>
					<th>Mobile</th>
					<th>Region</th>
					<th>Email</th>
					<th>Compliedaccount</th>
				</tr>
			</thead>

			@foreach($customerList as $index=>$customer)
				<tr>
					<td> {{ $customer['consigneeid'] }}
					<td> {{ $customer['companyname'] }}
					<td> {{ $customer['tradingname'] }}
					<td> {{ $customer['address'] }}
					<td> {{ $customer['tel'] }}
					<td> {{ $customer['mobile'] }}
					<td> {{ $customer['region'] }}
					<td> {{ $customer['email'] }}
					<td> {{ $customer['compliedaccount'] }}

				</tr>
				@endforeach
			</select>
		</table>
	</div>
@endsection


<script type="text/javascript">
$(document).ready(function() {

	$('showVessel').click(function()
	{
		var text = $('#showVessel').text;
		if(text=='All' || text=='')
			return false;

	});
});


</script>