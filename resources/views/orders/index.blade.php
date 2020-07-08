@extends('layout')
@section('header')
Pedidos
@endsection
@section('content')
<a href="/clients/create" class="btn btn-dark mb-2">Adicionar Pedido</a>
<ul class="list-group">
    @foreach($orders as $order)
    <li class="list-group-item">Pedido nº: {{$order->id}}
    data: {{$order->datetime}} Cliente nº: {{$order->client_id}}</li>
    @endforeach
</ul>
@endsection
