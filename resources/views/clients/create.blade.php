@extends('layout')
@section('header')
Cadastro de Clientes
@endsection
@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/clients/store" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <label for="street">Logradouro</label>
        <input type="text" name="street" class="form-control">
        <label for="number">Numero</label>
        <input type="text" name="number" class="form-control">
        <label for="phone">Telefone</label>
        <input type="text" name="phone" class="form-control">
        <button class="btn btn-primary">Adicionar</button>
    </div>
</form>
@endsection
