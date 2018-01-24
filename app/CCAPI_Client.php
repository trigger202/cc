<?php

namespace App;
use App\Http\CCAPI;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class CCAPI_Client extends CCAPI
{


    private $apiURL =   [
                            'getCustomers'=>'getCustomers.php',
                            'vesselList'=>'getIncomingVessels.php',
                            'vin_search'=>'vin_search.php',
                            'update_vin'=>'update_vin.php',


                        ];
    function __construct()
    {
        /*canot use the client until logged in*/
        if(!$this->isLoggedIn())
            return redirect('/login');

    }


    public function getVesellAndShipments()
    {

    	if($this->isLoggedIn())
    	{
    		$token = $this->getJWT();
	    	$res= $this->request($this->apiURL['vesselList'],'GET',$token);
	        return $res->getBody()->getContents();
    	}
    	/*not logged in*/

    }

    public function getCustomers()
    {

        if($this->isLoggedIn())
        {
            $token = $this->getJWT();
            $res= $this->request($this->apiURL['getCustomers'],'GET',$token);
            return $res->getBody()->getContents();
        }

    }

    /*update the vin number in the db (update means insert new or update old value ")*/
    public function updateVinNumber($queryString)
    {

        if(!$this->isLoggedIn())
        {
            redirect('/login');
            exit;
        }

        $queryString = (http_build_query($queryString));
        $url =$this->apiURL['update_vin'].'?'.$queryString;


        $token = $this->getJWT();
        $res= $this->request($url,'GET',$token);
        return $res->getBody()->getContents();

    }



    public function vin_search($queryArray)
    {

        $queryString = (http_build_query($queryArray));
        $url =$this->apiURL['vin_search'].'?'.$queryString;
        if(!$this->isLoggedIn())
        {
            redirect('/login');
            exit;
        }
        // dd($url);
        $token = $this->getJWT();
        $res= $this->request($url,'GET',$token);
        return $res->getBody()->getContents();

    }


    public function isLoggedIn()
    {
         return Session::has('jwt_token');
    }

    private function getJWT()
    {
        if(Session::has('jwt_token'))
            return Session::get('jwt_token');
        return false;

    }



}

// "vin_search.php?Vin_number=GE6-vin&Consigneeid=ABM"