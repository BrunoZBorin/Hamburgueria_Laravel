@extends('layout')
@section('header')
Pedidos
@endsection
@section('content')
<form action="/orders/edit" method="post">
@csrf
<button class="btn btn-dark mb-2" >Adicionar mais produtos</button>
<ul class="list-group">
    <li class="list-group-item">{{$client->name}} Fone: {{$client->phone}}</li>
    <li class="list-group-item">Pedido nº:{{$order->id}} Valor total: {{$order->value}}</li>
    
    <input type="hidden" name="client_id" value="{{$client->id}}" id="client_id">
    <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">
    <a href="/" class="btn btn-primary mt-2">Finalizar pedido</a>
</ul>
</form>
@endsection
