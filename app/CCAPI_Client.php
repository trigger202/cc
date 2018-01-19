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
        /*not logged in*/

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