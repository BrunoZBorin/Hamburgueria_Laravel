@extends('layout')
@section('header')
Bem vindo a Hamburgueria Valbernielson's
@endsection
@section('content')
@if(!empty($message))
        <div class="alert alert-danger">
            {{$message}}
        </div>
@endif
<body>
        <div>
            <div class="content">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-dark">Home</a>
                                <a href="admin" class="btn btn-dark">Administrativo</button>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                <div>
                    <form action="/clients/validatePhone" method="post">
                        @csrf
                        <label>Já sou cliente</label>
                        <input type="text" name="phone" placeholder="Digite aqui seu nº de telefone">
                        <button class="btn btn-primary">Entrar</button>
                    </form>
                    <label class="mt-2">Ainda não sou cliente</label>
                    <a href="/clients/create" class="btn btn-danger">Cadastrar-se</a>

                </div>
            </div>
        </div>
    </body>
@endsection
