<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CCAPI_Client;
use Illuminate\Support\Facades\Session;

class ComplianceCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        /*check is logged in */
        if(!session::has('jwt_token'))
            return redirect('/login');

        $vesselID = strtolower($request->vesselID);

        if(!$this->IsLoadShipmentDataLoaded())
        {
            $this->LoadShipmentData();
        }


        $Allshipments = session::get('Allshipments');
        $vesselList = session::get('vesselDropDown');

        /*if vessel is selected get cars for selected vessel*/
        if($vesselID!="all" &&  $vesselID!='')
        {
            $Allshipments = $this->getVesselList($vesselID,$Allshipments);
        }

        return view('center', ['vessels'=>$vesselList,'carList'=>$Allshipments,'selectedID'=>$vesselID]);

    }


    private function LoadShipmentData()
    {

        $apiClient = new CCAPI_Client();
        if($apiClient->isLoggedIn()!==true)
        {
            return redirect('login');
            exit();
        }

        $res =json_decode($apiClient->getVesellAndShipments(),true);


       $vesselList =$res['vesselList'];
       $carList =$res['carList'];

       Session()->put('Allshipments',$carList);
       Session()->put('vesselDropDown',$vesselList);
    }


    private function IsLoadShipmentDataLoaded()
    {
        if(session::has('Allshipments') && session::has('vesselDropDown'))
            return true;
        return false;
    }


    public function getVesselList($vesselID, $Allshipments )
    {

        if($vesselID=="all" || $vesselID=='All')
            return $Allshipments;

        $newCarList = [];
        foreach ($Allshipments as $index => $subArray)
        {
            if($subArray['vesselid']==$vesselID)
            {
                $newCarList[] = $subArray;
            }
        }
        return $newCarList;

    }

    public function vinRecordIndex()
    {


        return ('login');
    }


    public function getCustomers()
    {

        $apiClient = new CCAPI_Client();
        if($apiClient->isLoggedIn()!==true)
        {
            return redirect('login');
            exit();
        }

        $res =json_decode($apiClient->getCustomers(),true);

        $customers =$res['customers'];
        return view('customers', ['customerList'=>$customers]);

    }


}
