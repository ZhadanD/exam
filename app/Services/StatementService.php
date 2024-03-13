<?php

namespace App\Services;

use App\Models\Statement;

class StatementService
{
    public function getFullStatements()
    {
        return Statement::join('users', 'statements.user_id', '=', 'users.id')->get(['statements.id as statement_id', 'car_number', 'description_violation', 'lfp', 'status']);
    }

    public function index()
    {
        return auth()->user()->statements;
    }

    public function store($statement): void
    {
        Statement::create([
            'car_number' => $statement['car_number'],
            'description_violation' => $statement['description_violation'],
            'user_id' => auth()->id(),
        ]);
    }

    public function changeStatus($data, $statement_id): void
    {
        $statement = Statement::findOrFail($statement_id);

        if($statement->status === 'Новое') $statement->update($data);
    }
}
