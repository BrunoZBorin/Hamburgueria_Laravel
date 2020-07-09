@extends('layout')
@section('header')
Administrativo
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Clientes</div>
            <div class="card-body">
                <h5 class="card-title"><a class="text-white"href="/clients">Lista de Clientes</a></h5>
            </div>
        </div>
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Produtos</div>
            <div class="card-body">
                <h5 class="card-title"><a class="text-white" href="/products">Lista de Produtos</a></h5>
            </div>
        </div>
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Pedidos</div>
            <div class="card-body">
                <h5 class="card-title"><a class="text-white" href="/orders">Lista de Pedidos</a></h5>
            </div>
        </div>
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Venda</div>
            <div class="card-body">
                <form action="/orders/sales" method="post">
                    @csrf
                    <button class="btn btn-dark text-white">Lista de Vendas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
