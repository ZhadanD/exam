<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStatementRequest;
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
        $statements = $this->service->index();

        return view('client.main', compact('statements'));
    }

    public function create()
    {
        return view('client.statement.create');
    }

    public function store(CreateStatementRequest $request)
    {
        $statement = $request->validated();

        $this->service->store($statement);

        return redirect()->route('main');
    }
}
