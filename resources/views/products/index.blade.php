@extends('layout')
@section('header')
Produtos
@endsection
@section('content')
<a href="/products/create" class="btn btn-dark mb-2">Adicionar Clientes</a>
<ul class="list-group">
    @foreach($products as $product)
    <li class="list-group-item">Nome: {{$product->name}} Valor: {{$product->value}}</li>
    @endforeach
</ul>
@endsection
