<?php
$title = 'Регистрация'
?>
@extends('layouts.auth')
@section('content')
    <div class="container p-5">
        <form class="border border-dark p-3 rounded" method="POST" action="{{ route('register.store') }}">
            @csrf

            <p class="fs-3 text-center">Регистрация</p>

            <label for="login">Логин</label>
            <input value="{{ old('login') }}" type="text" name="login" id="login" class="form-control" placeholder="Введите свой логин" required>
            @error('login')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="password">Пароль</label>
            <input value="{{ old('password') }}" type="password" name="password" id="password" class="form-control" placeholder="Введите свой пароль" min="6" required>
            @error('password')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="lfp">ФИО</label>
            <input value="{{ old('lfp') }}" type="text" name="lfp" id="lfp" class="form-control" placeholder="Введите свое ФИО" required>
            @error('lfp')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="phone">Телефон</label>
            <input value="{{ old('phone') }}" type="text" name="phone" id="phone" class="form-control" placeholder="Введите свой телефон" required max="11">
            @error('phone')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="email">Email</label>
            <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control" placeholder="Введите свой email" required>
            @error('email')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <p class="fs-5">Уже есть аккаунт? <a class="link-dark" href="{{ route('login.create') }}">Войдите</a>!</p>

            <div class="text-center">
                <button type="submit" class="btn btn-dark">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
