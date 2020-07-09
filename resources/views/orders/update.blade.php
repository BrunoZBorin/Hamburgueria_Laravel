@extends('layout')
@section('header')
Editar Pedido
@endsection
@section('content')

    <form action="/orders/edit" method="post">
        @csrf
        <button class="btn btn-dark mb-2" >Adicionar mais produtos</button>
        <input type="hidden" name="client_id" value="{{$client->id}}" id="client_id">
        <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">
    </form>
    <h5>Itens:</h5>
    @foreach($products as $product)
        <form action="/orders/delete_product" method="post">
            @csrf
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Item: {{$product->name}} quantidade: {{$product->qtd}}
            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></li>
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input type="hidden" name="qtd" value="{{$product->qtd}}">
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <input type="hidden" name="op_id" value="{{$product->op_id}}">
            <input type="hidden" name="client_id" value="{{$client->id}}">
        </form>
    @endforeach
<ul class="list-group">
    <form action="/orders/update_order" method="post">
        @csrf
        <li class="list-group-item">Numero do Pedido: {{$order->id}}</li>
        <input type="hidden" name="client_id" value="{{$client->id}}">
        <input type="hidden" name="order_id" value="{{$order->id}}">
        <input type="date" class="list-group-item col-12" value="{{$order->datetime}}"name="datetime">
        <input type="text" class="list-group-item col-12" value="{{$client->street}}" name="street">
        <input type="text" class="list-group-item col-12" value="{{$client->number}}" name="number">
        <li class="list-group-item">R${{$order->value}}</li>
        <button class="btn btn-primary mt-2">Editar dados</button>
    </form>
</ul>
@endsection