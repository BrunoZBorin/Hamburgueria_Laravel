@extends('layout')
@section('header')
Adicionar Pedido
@endsection
@section('content')
<form action="/orders/store" method="post">
    @csrf
    <div class="form-group">
        <label for="client_id" class="mt-3">Cliente</label>
        <h5 class="text-primary">{{$client->name}}</h5>
        <input type="hidden" name="value" value=0 class="form-control">
        <input type="hidden" name="client_id" value="{{$client->id}}" class="form-control">
        <label for="datetime">Data</label>
        <input type="date" name="datetime" class="form-control">
        <input type="hidden" name="status" value="Pedido">
        <button class="btn btn-primary">Adicionar Produtos</button>
    </div>
</form>
@endsection
