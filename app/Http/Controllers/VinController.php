<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CCAPI_Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class VinController extends Controller
{


	public function index(Request $request)
	{


		 $apiClient = new CCAPI_Client();
        if($apiClient->isLoggedIn()!==true)
        {
            return redirect('login');
            exit();
        }

        $res =json_decode($apiClient->getCustomers(),true);
        $customers =$res['customers'];
		$customers= array_column($customers, 'consigneeid');

		$yearList =range(date('Y'), 1985);
		session::put('activeCustomers', $customers);
		return view('vin_search', ['yearList'=>$yearList, 'activeCustomers'=>$customers ]);

	}

/*vin _search*/
public function show(Request $request)
{



	 /*vin_seach($vin, $make, $model,$year, $km)*/
	$filterList =['Vin_number', 'Consigneeid', 'Year','Make','Model','KM','VehicleID'];


	$yearList =range(date('Y'), 1985);

	$input = Input::all();

	 $query =[];
	 foreach ($filterList as $index=>$value)
	 {
 		if(isset($input[$value]))
 		{
 			$query[$value] = $input[$value];
 		}
	 }


	 if(!isset($input['Vin_number']))
	 {
		 if(count($query)<4)
		 {
			flash('<ul><li>Filter more please...Will not be able to find the vehicle like this.</li></ul>')->error();
			return redirect('vin')->withInput($input);
		 }
	 }


	 $apiClient = new CCAPI_Client();
	 $res = $apiClient->vin_search($query);
	 $result = json_decode($res,true);



	 if($result['result']==1)
	 {
		$car = end($result['match']);
 		return view('vin_update',['yearList'=>$yearList,'car'=>$car ] );
 		exit();
	 }



   	flash('<ul><li>No matching record found.</li></ul>')->error();
	 return redirect ('vin')->withInput($input );

}

public function LookForVIn(Request $request)
{

	$query['Vin_number']= $request->Vin_number;
	$query['Consigneeid']= $request->Consigneeid;


	 $apiClient = new CCAPI_Client();
	 $res = $apiClient->vin_search($query);
	 $result = json_decode($res,true);

	echo $result['result'];

}



public function store(Request $request)
{
	$newVin = $request->new_vin;

		 /*vin_seach($vin, $make, $model,$year, $km)*/
	$filterList =['new_vin','vehicleid', 'chassis', 'mark'];

	$input = Input::all();

	 $query =[];
	 foreach ($filterList as $index=>$value)
	 {
 		if(isset($input[$value]))
 		{
 			$query[$value] = $input[$value];
 		}

	 }


	 $apiClient = new CCAPI_Client();
	 $res = $apiClient->updateVinNumber($query);
	 $result = json_decode($res,true);


	// dd($request);
	$yearList =range(date('Y'), 1985);

	 $flashMessage = $result['response'];

    flash("<ul><li>$flashMessage </ul>")->success();
	 return view('vin_search',['yearList'=>$yearList ]);

}



}
