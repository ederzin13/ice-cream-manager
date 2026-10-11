<?php

namespace App\Controllers;

use Core\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(): void
    {
        $title = 'Client';
        $this->render('client-dashboard/client-dashboard', compact('title'));
    }
}