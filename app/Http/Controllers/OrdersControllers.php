<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OrderRequest;

use App\Order;

use App\Product;

use App\Client;

use App\Order_Product;

use Illuminate\Support\Facades\DB;

class OrdersControllers extends Controller
{
    function index(Request $request)
    {   
        $orders = DB::table('orders')
                ->where('orders.status','!=','Cancelado')
                ->get();
        $message = $request->session()->get('message');
        
        return view('orders.index', compact('orders','message'));
    }
    
    function create(Request $request)
    {   
        $client = Client::find($request->client_id);
        return view('orders.create', compact('client'));
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
    
    function store_product_order(OrderRequest $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($request->client_id);
        $products = Product::all();
        $product = Product::find($request->product_id);
        $order_product = Order_Product::create([
            'order_id'=>$request->order_id,
            'product_id'=>$request->product_id,
            'qtd'=>$request->qtd,
            'status'=>'Ativo'
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

    public function to_view(int $id)
    {
        $order = Order::find($id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd')
                ->get();
        return view('orders.to_view', compact('order','products'));
    }

    function client_edit(Request $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($request->client_id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd','order__products.id as op_id')
                ->get();
        return view('orders.update', compact('order','client','products'));
    }
    
    function delete_product(Request $request)
    {
        $product = Product::find($request->product_id);
        $order = Order::find($request->order_id);
        $order->value -= ($product->value*$request->qtd);
        $order->save();
        $order_product = Order_Product::find($request->op_id);        
        $order_product->status ='Cancelado';
        $order_product->save();
        $client = Client::find($request->client_id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd','order__products.id as op_id')
                ->get();
        return view('orders.update', compact('order','client','products'));
    }

    function update_order(Request $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($request->client_id);
        $order->datetime = $request->datetime;
        $client->street = $request->street;
        $client->number = $request->number;
        $client->save();
        $order->save();
        $request->session()
            ->flash(
                'message',
                "Pedido editado com sucesso"
            );
        return redirect('/');
    }
    function order_filter(Request $request)
    {
        $week = date('Y-m-d', strtotime('-7 days'));
        $month = date('Y-m-d', strtotime('-30 days'));
        $client_id = $request->client_id;
      
        if($request->date_order=='7'){
            $orders = DB::table('orders')
                     ->whereDate('orders.datetime','>',$week)
                     ->where('status', '=', 'Entregue')
                     ->where('client_id','=',$client_id)
                     ->get();
        }
        if($request->date_order=='30'){
            $orders = DB::table('orders')
                     ->whereDate('orders.datetime','>',$month)
                     ->where('status', '=', 'Entregue')
                     ->where('client_id','=',$client_id)
                     ->get();
        }
        if($request->date_order=='all'){
            $orders = DB::table('orders')
                     ->where('status', '=', 'Entregue')
                     ->where('client_id','=',$client_id)
                     ->get();
        }
        $client = Client::find($request->client_id);
        
        return view('orders.show_orders_date', compact('client','orders'));
    }

    function admin_edit(Request $request)
    {
        $order = Order::find($request->order_id);
        $client = Client::find($order->client_id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd','order__products.id as op_id')
                ->get();
        return view('orders.admin_update', compact('order','client','products'));
    }
    function admin_delete_product(Request $request)
    {
        $product = Product::find($request->product_id);
        $order = Order::find($request->order_id);
        $order->value -= ($product->value*$request->qtd);
        $order->save();
        $order_product = Order_Product::find($request->op_id);        
        $order_product->status ='Cancelado';
        $order_product->save();
        $client = Client::find($request->client_id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd','order__products.id as op_id')
                ->get();
        return view('orders.admin_update', compact('order','client','products'));
    }
    function order_status(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
        $client = Client::find($request->client_id);
        $products = DB::table('orders')
                ->join('order__products','orders.id','=','order__products.order_id')
                ->where('order__products.order_id','=',$order->id)
                ->join('products','order__products.product_id','=','products.id')
                ->where('order__products.status','=','Ativo')
                ->select('products.*','order__products.qtd','order__products.id as op_id')
                ->get();
        return view('admin.initial_page', compact('order','client','products'));
    }
    function sales()
    {
        $week = date('Y-m-d', strtotime('-7 days'));
        $total = DB::table('orders')
                ->select(DB::raw('sum(value) as total'))
                ->where('status', '=', 'Entregue')
                ->whereDate('datetime','>',$week)
                ->get();
                $total = json_decode($total, true);
        $orders = DB::table('orders')
                ->where('status', '=', 'Entregue')
                ->whereDate('datetime','>',$week)
                ->get();         
        
        return view('admin.sales', compact('total','orders'));
    }



}
