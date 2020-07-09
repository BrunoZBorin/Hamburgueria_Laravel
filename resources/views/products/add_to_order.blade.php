@extends('layout')
@section('header')
Produtos
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
<ul class="list-group">
    <h4>Cliente: {{$client->name}}</h4>
    @foreach($products as $product)
    <form action="/orders/store_product_order" method="post" class="form-control">
        @csrf
        <li class="list-group-item d-flex justify-content-between align-items-center">Nome: {{$product->name}} 
            <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
            <input type="hidden" name="client_id" value="{{$client->id}}" id="client_id">
            <input type="hidden" name="order_id" value="{{$order->id}}" id="order_id">
            <span class="d-flex">
                Valor: {{$product->value}} <input type="number" name="qtd" id="qtd"class="col col-3 ml-2" placeholder="Quant.">
                <button class="btn btn-primary btn-sm ml-2" type="submit">Adicionar</button>
            </span>
        </li>
    </form>
    @endforeach
</ul>
@if(!empty($order_product->id))
<ul class="list-group">
    <li class="list-group-item">
        {{$order_product->id}}
    </li>
</ul>
@endif
@endsection
