<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\CCAPI;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;




use firebase;
use App\CC_User;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $apiClient;
    public function __construct()
    {




    }

    public function index()
    {
        return view('templogin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logIn(Request $request)
    {

        $request->session()->flush();

            $messages = [
                'required' => 'The :attribute field is invalid.',
            ];

        Validator::make($request->all(), [
            'username' => 'required|max:70',
            'password' => 'required',
        ])->validate();


        $url = "login_user.php";

        $fullURL = env('API_HOST').$url;
        $httpClient = new Client();


        $res = $httpClient->request('POST', $fullURL, [
            'multipart' => [
                [
                    'name'     => 'username',
                    'contents' =>  $request->username
                ],
                [
                    'name'     => 'password',
                    'contents' => $request->password
                ]
            ]
         ]);


       $body = json_decode($res->getBody()->getContents(),true);


       if(isset($body['Error']))
        {
            flash('<ul><li>Incorrect username or password.</li></ul>')->error();
            return redirect('login')->withInput( $request->except('password'));
            return false;
        }


       $token = $body['jwt'];
       $ccName = $body['ccName'];

       $request->session()->put('jwt_token',$token);
       $request->session()->put('cc_name',$ccName);

        return redirect('cc_index');
    }


    public function destroy()
    {
        session::flush();
        return redirect('/login');
    }
}
