<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function create()
    {
        return view('auth.register');
    }

    public function createLogin()
    {
        return view('auth.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $data = $request->validated();

        $this->service->login($data);

        return redirect()->route('main');
    }

    public function store(RegisterRequest $request)
    {
        $newUser = $request->validated();

        $this->service->register($newUser);

        return redirect()->route('main');
    }
}
