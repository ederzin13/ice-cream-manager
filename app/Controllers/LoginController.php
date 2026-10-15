<?php

namespace App\Controllers;

use Core\Http\Controllers\Controller;
use App\Models\User;
use Lib\Authentication\Auth;
use Lib\FlashMessage;

class LoginController extends Controller
{
    public function index(): void
    {
        $this->redirect();

        $title = 'Tela de login';
        $this->render('login/login', compact('title'));
    }

    public function login(): void
    {
        // Os dados do form vêm em name="user[email]" e name="user[password]"
        $email = $_POST['user']['email'] ?? '';
        $password = $_POST['user']['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && $user->authenticate($password)) {
            Auth::login($user);
            $this->redirect(); // chama o seu método que já verifica se é admin ou client!
            return;
        }

        FlashMessage::danger('E-mail ou senha inválidos!');
        $this->redirectTo(route('root'));
    }

    public function redirect(): void
    {
        $user = Auth::user();

        if ($user) 
        {
            if ($user->role === 'client') 
            {
                $this->redirectTo(route('client.dashboard'));
            }

            if ($user->role === 'admin')
            {
                $this->redirectTo(route('admin.dashboard'));
            }
        }
    }

    public function logout(): void
    {
        Auth::logout();
        FlashMessage::success('Desconectado com sucesso');
        $this->redirectTo('/');
    }
}
