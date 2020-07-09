@extends('layout')
@section('header')
Visualizar Pedido
@endsection
@section('content')
<ul class="form-control">
    
    <li class="list-group-item">Numero do Pedido: {{$order->id}}</li>
    <li class="list-group-item">Data: {{$order->datetime}}</li>
    @foreach($products as $product)
        <li class="list-group-item">Qtdade{{$product->qtd}} {{$product->name}}</li>
    @endforeach
    <li class="list-group-item">R${{$order->value}}</li>
    
</ul>
@endsection