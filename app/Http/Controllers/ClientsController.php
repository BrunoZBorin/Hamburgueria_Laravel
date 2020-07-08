<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;

use App\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());
        $request->session()
            ->flash(
                'message',
                "Cliente {$client->name} cadastrado com sucesso"
            );
       
        return redirect ('/');
        
    }
    public function validatePhone(ClientRequest $request)
    {
        $phone = $request->phone;
        $clients = Client::all();        
        foreach($clients as $client){
            if($phone == $client->phone){

                return view('orders.create', compact('client'));
            }
        }
    
        $request->session()
        ->flash(
            'message',
                'Telefone não cadastrado, tente novamente ou faça um cadastro ŕapido'
            ); 
            
            return redirect ('/');
    }
}
