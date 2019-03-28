<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Pool;

class LogInController extends Controller
{
    public function logIn(Request $request){
        $client = new Client();
        $client = new Client();
        $response=$client->post('http://localhost/CompanyManager-master/public/api/auth',[
            'email'=>$request->email,
            'password'=>$request->password
        ]);


        dd($response);
    }
}
