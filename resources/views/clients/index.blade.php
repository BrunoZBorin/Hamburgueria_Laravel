@extends('layout')
@section('header')
Clientes
@endsection
@section('content')
<a href="/clients/create" class="btn btn-dark mb-2">Adicionar Clientes</a>
<ul class="list-group">
    @foreach($clients as $client)
    <li class="list-group-item">{{$client->name}}</li>
    @endforeach
</ul>
@endsection
