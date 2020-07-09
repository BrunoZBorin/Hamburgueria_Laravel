@extends('layout')
@section('header')
Produtos
@endsection
@section('content')
<a href="/products/create" class="btn btn-dark mb-2">Adicionar Produtos</a>
<ul class="list-group mb-2">
    @foreach($products as $product)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Nome: {{$product->name}} Valor: {{$product->value}}
        <span class="d-flex">
            <a class="btn btn-primary btn-sm" href="/products/{{$product->id}}/edit"><i class="far fa-edit"></i></a>
            <form method="post" action="/products/remove/{{$product->id}}"
                onsubmit="return confirm('Está certo da exclusão?')">
                @csrf
                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
            </form>
        </span>
    </li>
    @endforeach
</ul>
<a href="/admin" class="btn btn-primary mb-2">Administrativo</a>
@endsection
