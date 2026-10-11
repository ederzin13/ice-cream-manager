<?php

namespace App\Middleware;

use App\Models\User;
use Core\Http\Middleware\Middleware;
use Core\Http\Request;
use Lib\Authentication\Auth;
use Lib\FlashMessage;

class ClientAccess implements Middleware
{
    public function handle(Request $request): void
    {
        if (!Auth::check())
        {
            FlashMessage::danger('Você deve estar logado para acessar essa página!');
            $this->redirectTo(route('root'));
        }

        $user = Auth::user();

        if ($user->role !== 'client')
        {
            FlashMessage::danger('Acesso negado! Seu usuário não é cliente');
            $this->redirectTo('/admin-dashboard');
        }
    }

    private function redirectTo(string $location): void
    {
        header('Location: ' . $location);
        exit;
    }
}