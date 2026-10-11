<?php

namespace App\Controllers;

use Core\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(): void
    {
        $title = 'Tela de login';
        $this->render('login/login', compact('title'));
    }
}
