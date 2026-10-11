<?php

namespace App\Middleware;

use Core\Http\Middleware\Middleware;
use Core\Http\Request;
use Lib\Authentication\Auth;
use Lib\FlashMessage;

class AdminAccess implements Middleware
{
  public function handle(Request $request): void
  {
    if (!Auth::check())
    {
      FlashMessage::danger('Você deve estar logado para acessar essa página!');
      $this->redirectTo(route('root'));
    }

    $user = Auth::user();

    if ($user->role !== 'admin')
    {
      FlashMessage::danger('Acesso negado! Seu usuário não é admin');
      $this->redirectTo('client-dashboard');
    }
  }
  private function redirectTo(string $location): void
    {
      header('Location: ' . $location);
      exit;
    }
}