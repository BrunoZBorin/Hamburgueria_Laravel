@extends('layout')
@section('header')
Cadastro de Clientes
@endsection
@section('content')
<form action="/clients/update" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" value="{{$client->name}}" name="name" class="form-control">
        <label for="street">Logradouro</label>
        <input type="text" value="{{$client->street}}" name="street" class="form-control">
        <label for="number">Numero</label>
        <input type="text" value="{{$client->number}}" name="number" class="form-control">
        <label for="phone">Telefone</label>
        <input type="text" value="{{$client->phone}}" name="phone" class="form-control">
        <input type="hidden" value="{{$client->id}}" name="id" >
        <button class="btn btn-primary">Adicionar</button>
    </div>
</form>
@endsection
