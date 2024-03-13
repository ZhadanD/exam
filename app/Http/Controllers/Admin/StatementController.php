<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusStatementRequest;
use App\Services\StatementService;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    private StatementService $service;

    public function __construct(StatementService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $statements = $this->service->getFullStatements();

        return view('admin.statement.index', compact('statements'));
    }

    public function update(ChangeStatusStatementRequest $request, $statement_id)
    {
        $data = $request->validated();

        $this->service->changeStatus($data, $statement_id);

        return redirect()->route('admin.statements.index');
    }
}
