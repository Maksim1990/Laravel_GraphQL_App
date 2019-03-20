<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $client = new \phpcent\Client("http://centrifugo:8000/api");

        $client->setApiKey("potato");
  $token = $client->setSecret("potato")->generateConnectionToken(1);

       $client->publish("news", ["message" => "Hello Everybody"]);

        return view('home',compact('token'));
    }
}
