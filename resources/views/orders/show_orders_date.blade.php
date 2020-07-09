@extends('layout')
@section('header')
Pedidos de {{$client->name}}
@endsection
@section('content')
<form action="/orders/create">
<input type="hidden" value="{{$client->id}}" name="client_id">
<button class="btn btn-dark mb-2">Adicionar Pedido</button>
</form>
<ul class="list-group">
    @foreach($orders as $order)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/orders/{{$order->id}}/to_view">
        Pedido nº: {{$order->id}}
        data: {{$order->datetime}} Cliente nº: {{$order->client_id}}
        Status: {{$order->status}}</a>
        <span class="d-flex">
            @if($order->status == 'Pedido')
            <form action="../orders/client_edit" method="post">
                @csrf
                <button class="btn btn-primary">Editar</button>
                <input type="hidden" value="{{$client->id}}" name="client_id">
                <input type="hidden" value="{{$order->id}}" name="order_id">
            </form>
            @endif
        </span></li>
    
    @endforeach
</ul>
@endsection
