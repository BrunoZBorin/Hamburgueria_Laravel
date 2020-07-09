@extends('layout')
@section('header')
Clientes
@endsection
@section('content')
<a href="/clients/create" class="btn btn-dark mb-2">Adicionar Clientes</a>
<ul class="list-group mb-2">
    @foreach($clients as $client)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{$client->name}}
            <span class="d-flex">
                <a class="btn btn-primary btn-sm" href="/clients/{{$client->id}}/edit"><i class="far fa-edit"></i></a>
                <form method="post" action="/clients/remove/{{$client->id}}"
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
