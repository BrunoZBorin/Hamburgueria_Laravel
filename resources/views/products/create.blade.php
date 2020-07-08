@extends('layout')
@section('header')
Adicionar Produtos
@endsection
@section('content')
<form action="/products/store" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <label for="description">Descrição</label>
        <input type="text" name="description" class="form-control">
        <label for="value">Valor</label>
        <input type="number" step="0.01" name="value" class="form-control">
        <button class="btn btn-primary">Adicionar</button>
    </div>
</form>
@endsection
