<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ClientRequest;

use Illuminate\Support\Facades\DB;

use App\Client;

use App\Order;

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
    
    function edit(int $id)
    {
        $client = Client::find($id);
        return view('clients.update', compact('client'));
    }

    function update(Request $request)
    {
        $client = Client::find($request->id);
        $client->name = $request->name;
        $client->street = $request->street;
        $client->number = $request->number;
        $client->number = $request->number;
        $client->save();
        return redirect ('/clients');
    }

    function destroy(Request $request)
    {
        Client::destroy($request->id);
        return redirect ('/clients');
    }

    public function validatePhone(ClientRequest $request)
    {
        $phone = $request->phone;
        $clients = Client::all();
        foreach($clients as $client){
            if($phone == $client->phone)
            {
                $orders = DB::table('orders')
                ->where('client_id','=', $client->id)
                ->get();        
                return view('orders.start', compact('client','orders'));
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
