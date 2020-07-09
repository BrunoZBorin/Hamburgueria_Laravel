@extends('layout')
@section('header')
Pedidos de {{$client->name}}
@endsection
@section('content')
<form action="/orders/create">
<input type="hidden" value="{{$client->id}}" name="client_id">
<button class="btn btn-dark mb-2">Adicionar Pedido</button>
</form>
<form action="/orders/order_filter" method="post">
    @csrf
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Pedidos Anteriores</label>
    </div>
    <select class="custom-select" name="date_order" id="date_order">
        <option selected>Escolha o período.</option>
        <option value="7">A última semana</option>
        <option value="30">O último mês</option>
        <option value="all">Todos os pedidos</option>
    </select>
    </div>
    <input type="hidden" name="client_id" value="{{$client->id}}">
    <button class="btn btn-primary">Buscar</button>
</form>
@endsection
