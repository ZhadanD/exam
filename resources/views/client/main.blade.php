<?php
$title = 'Главная страница'
?>
@extends('layouts.app')
@section('content')
    <div class="container border border-dark mt-3 p-3 rounded">
        <a href="{{ route('statements.create') }}" class="btn btn-success btn-lg">+</a>

        <p class="fs-3 text-center">Мои заявления</p>

        <div class="container border border-dark mt-3 p-3 rounded">
            <div class="row">
                @foreach($statements as $statement)
                    <div class="col-lg-4 col-md-12 col-sm-12 p-2">
                        <p class="fs-4 text-center">{{ $statement->car_number }} (<span class="fs-5 {{ ($statement->status === 'Новое') ? 'text-primary' : (($statement->status === 'Подтверждено') ? 'text-success' : 'text-danger') }}">{{ $statement->status }}</span>)</p>

                        <div class="m-2 border border-dark rounded p-3">
                            <p class="fs-5">{{ $statement->description_violation }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
