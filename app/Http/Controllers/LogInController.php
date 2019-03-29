<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Pool;

class LogInController extends Controller
{
    public function logIn(Request $request){
        $client = new Client();
        $response=$client->post('http://localhost:8000/api/auth',[ 'form_params' => [
            'email'=>$request->email,
            'password'=>$request->password]
        ]);

        $user = json_decode($response->getBody());
        session()->put('user', $user);
        return redirect('/');
    }

    public function loginForm() {
        return view('auth.login');
    }
}
