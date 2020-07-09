@extends('layout')
@section('header')
Pedidos
@endsection
@section('content')
<ul class="list-group">
    @foreach($orders as $order)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Pedido nº: {{$order->id}}
            data: {{$order->datetime}} Cliente nº: {{$order->client_id}} Status:{{$order->status}}
            <span class="d-flex">
                <form action="../orders/admin_edit" method="post">
                    @csrf
                    <button class="btn btn-primary">Editar</button>
                    <input type="hidden" value="{{$order->id}}" name="order_id">
                </form>
            </span>
        </li>
    @endforeach
</ul>
@endsection
