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
    <ul class="list-group">
        <li class="list-group-item">Nome: {{$client->name}}</li>
        <li class="list-group-item">Logradouro:{{$client->street}} {{$client->number}}</li>
        <li class="list-group-item">Telefone:{{$client->phone}}</li>
        <li class="list-group-item">Pedido nº:{{$order->id  }}</li>
        <li class="list-group-item">Valor do pedido:{{$order->value}}</li>
    </ul>

    <h5>Itens:</h5>
    @foreach($products as $product)
        <form action="/orders/admin_delete_product" method="post">
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
    <form action="/orders/order_status" class="mt-2" method="post">
        @csrf
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Status do pedido</label>
        </div>
        <select class="custom-select" name="status" id="status">
            <option selected>{{$order->status}}</option>
            <option value="Pedido">Pedido</option>
            <option value="Produção">Produção</option>
            <option value="Entregue">Entregue</option>
            <option value="Cancelado">Cancelado</option>
        </select>
        </div>
        <input type="hidden" name="order_id" value="{{$order->id}}">
        <input type="hidden" name="client_id" value="{{$client->id}}" id="client_id">
        <button class="btn btn-primary mb-2">Alterar pedido</button>
    </form>
@endsection