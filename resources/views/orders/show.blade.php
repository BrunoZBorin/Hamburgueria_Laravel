@extends('layout')
@section('header')
Pedidos
@endsection
@section('content')
<div class="row justify-content-between">
    <form action="/orders/edit" method="post">
        @csrf
        <button class="btn btn-dark mb-2 ml-2" >Adicionar mais produtos</button>
        <input type="hidden" name="client_id" value="{{$client->id}}" id="client_id">
        <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">
    </form>
    <form action="../orders/client_edit" method="post">
        @csrf
        <button class="btn btn-primary mr-2">Editar</button>
        <input type="hidden" value="{{$client->id}}" name="client_id">
        <input type="hidden" value="{{$order->id}}" name="order_id">
    </form>
</div>
<ul class="list-group">
    <li class="list-group-item">{{$client->name}} Fone: {{$client->phone}}</li>
    <li class="list-group-item">Pedido nº:{{$order->id}} Valor total: {{$order->value}}</li>
    <form action="/">
        <button class="btn btn-primary mt-2"  onsubmit="return confirm('Deseja finalizar o pedido?')">Finalizar pedido</button>
    </form>
</ul>

@endsection
