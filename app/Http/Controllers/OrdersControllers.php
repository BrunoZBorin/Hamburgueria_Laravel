<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

use App\Product;

use App\Client;

use App\Order_Product;

use Illuminate\Support\Facades\DB;

class OrdersControllers extends Controller
{
    function index(Request $request)
    {   
        $orders = Order::all();
        $message = $request->session()->get('message');
        
        return view('orders.index', compact('orders','message'));
    }
    
    function create()
    {   
        return view('orders.create');
    }

    function store(Request $request)
    {   
        $products = Product::all();
        $order = Order::create([
            'status' => $request->status,
            'datetime' => $request->datetime,
            'value' => $request->value,
            'client_id' => $request->client_id
            ]);
        $client = Client::find($request->client_id);
        $request->session()
            ->flash(
                'message',
                "Pedido {$order->id} cadastrado com sucesso"
            );
       
            return view('products.add_to_order', compact('client','order','products'));

    }
    function store_product_order(Request $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($request->client_id);
        $products = Product::all();
        $product = Product::find($request->product_id);
        $order_product = Order_Product::create([
            'order_id'=>$request->order_id,
            'product_id'=>$request->product_id,
            'qtd'=>$request->qtd
        ]);
        $order->value += ($product->value * $request->qtd);
        $order->save();
        return view('orders.show', compact('client','order','products', 'order_product'));

    }
    function edit(Request $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($request->client_id);
        $products = Product::all();
        return view('products.add_to_order', compact('client','order','products'));
    }
    
}
