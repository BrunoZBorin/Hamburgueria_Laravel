@extends('layout')
@section('header')
Vendas da semana
@endsection
@section('content')
<a href="/" class="btn btn-dark mb-2">Tela Inicial</a>
<ul class="list-group">
    @foreach($orders as $order)
    <li class="list-group-item ">Pedido nº{{$order->id}} Data:{{$order->datetime}} - R${{$order->value}}</li>
    @endforeach
    <li class="list-group-item ">Total R${{$total[0]["total"]}}</li>
</ul>
@endsection
