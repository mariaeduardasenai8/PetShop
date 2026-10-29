<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('livewire.login-index'); // Ou a tua view de login correspondente
    }
}