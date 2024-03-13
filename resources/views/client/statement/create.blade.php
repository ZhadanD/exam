<?php
$title = 'Формирование заявления'
?>
@extends('layouts.app')
@section('content')
    <div class="container border border-dark mt-3 p-3 rounded">
        <p class="fs-3 text-center">Формирование заявления</p>

        <form method="POST" action="{{ route('statements.store') }}">
            @csrf

            <label for="car_number">Государственный регистрационный номер автомобиля</label>
            <input required value="{{ old('car_number') }}" class="form-control" type="text" id="car_number" name="car_number" placeholder="Введите номер автомобиля">
            @error('car_number')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <label for="description_violation">Описание нарушения</label>
            <textarea class="form-control" required name="description_violation" id="description_violation" placeholder="Введите описание нарушения">{{ old('description_violation') }}</textarea>
            @error('description_violation')
                <p class="fs-3 text-danger">{{ $message }}</p>
            @enderror

            <br/>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Отправить</button>
            </div>
        </form>
    </div>
@endsection
