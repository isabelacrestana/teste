@extends('layouts.app')

@section('title','Novo Usuário')

@section('content')
    <h1>Novo Usuário</h1>

    @if ($errors -> any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
        
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{old('name')}}"> <br><br>
        <input type="email" name="email" placeholder="Email" value="{{old('email')}}"> <br><br>
        <input type="password" name="password" placeholder="Senha" value="{{old('password')}}"> <br><br>
        <input type="submit" name="btn-entrar" value="Entrar"><br> 
    </form>
@endsection