@extends('layout')
@section('header')
Edição de Produtos
@endsection
@section('content')
<form action="/products/update" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" value="{{$product->name}}" name="name" class="form-control">
        <label for="description">Descrição</label>
        <input type="text" value="{{$product->description}}" name="description" class="form-control">
        <label for="value">Value</label>
        <input type="number" step="0.01" value="{{$product->value}}" name="value" class="form-control">
        <input type="hidden" value="{{$product->id}}" name="id" >
        <button class="btn btn-primary mt-2">Alterar</button>
    </div>
</form>
@endsection
