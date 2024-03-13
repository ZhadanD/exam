<?php
$title = 'Все заявления'
?>
@extends('layouts.admin')
@section('content')
    <div class="container border border-dark mt-3 p-3 rounded">
        <p class="fs-3 text-center">Все заявления</p>

        <div class="container border border-dark mt-3 p-3 rounded">
            <div class="row">
                @foreach($statements as $statement)
                    <div class="col-lg-4 col-md-12 col-sm-12 p-2">
                        <p class="fs-4">ФИО: {{ $statement->lfp }}</p>
                        <p class="fs-4 text-center">{{ $statement->car_number }} (<span class="fs-5 {{ ($statement->status === 'Новое') ? 'text-primary' : (($statement->status === 'Подтверждено') ? 'text-success' : 'text-danger') }}">{{ $statement->status }}</span>)</p>

                        <div class="m-2 border border-dark rounded p-3">
                            <p class="fs-5">{{ $statement->description_violation }}</p>
                        </div>

                        @if($statement->status === 'Новое')
                            <div class="d-flex justify-content-center">
                                <form class="m-1" action="{{ route('admin.statements.update', $statement->statement_id) }}" method="post">
                                    @csrf
                                    @method('patch')

                                    <input name="status" type="hidden" value="Подтверждено">

                                    <button type="submit" class="btn btn-outline-success">Подтвердить</button>
                                </form>

                                <form class="m-1" action="{{ route('admin.statements.update', $statement->statement_id) }}" method="post">
                                    @csrf
                                    @method('patch')

                                    <input name="status" type="hidden" value="Отклонено">

                                    <button type="submit" class="btn btn-danger">Отклонить</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
