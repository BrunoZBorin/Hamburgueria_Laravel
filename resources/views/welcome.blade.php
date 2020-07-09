@extends('layout')
@section('header')
Bem vindo a Hamburgueria Valbernielson's
@endsection
@section('content')
@if(!empty($message))
        <div class="alert alert-success">
            {{$message}}
        </div>
@endif
<body>
        <div>
            <div class="content">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-dark">Logout</a>
                                <a href="admin" class="btn btn-dark">Administrativo</a>
                            @else
                                <a class="btn btn-dark" href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a class="btn btn-dark" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                <div class="row mt-5">
                    <form action="/clients/validatePhone" class="mr-4 mb-4" method="post">
                        @csrf
                        <label class="ml-4">Já sou cliente</label>
                        <input type="text" name="phone" placeholder="Digite aqui seu nº de telefone">
                        <button class="btn btn-primary">Entrar</button>
                    </form>
                    <label class="mt-2">Ainda não sou cliente</label>
                    <a href="/clients/create" class="btn btn-danger ml-4 mb-4">Cadastrar-se</a>

                </div>
            </div>
        </div>
    </body>
@endsection
