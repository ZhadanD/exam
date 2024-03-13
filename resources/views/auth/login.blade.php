<?php
$title = 'Авторизация'
?>
@extends('layouts.auth')
@section('content')
    <div class="container p-5">
        <form class="border border-dark p-3 rounded" method="POST" action="{{ route('login.store') }}">
            @csrf

            <p class="fs-3 text-center">Авторизация</p>

            <label for="login">Логин</label>
            <input value="{{ old('login') }}" type="text" name="login" id="login" class="form-control" placeholder="Введите свой логин" required>
            @error('login')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Введите свой пароль" min="6" required>
            @error('password')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <p class="fs-5">Еще нет аккаунта? <a class="link-dark" href="{{ route('register.create') }}">Зарегайтесь</a>!</p>

            <div class="text-center">
                <button type="submit" class="btn btn-dark">Войти</button>
            </div>
        </form>
    </div>
@endsection
