<?php

namespace App\Controllers;

use Core\Http\Controllers\Controller;

class AdminController extends Controller 
{
  public function index(): void 
  {
    $title = 'Admin';
    $this->render('admin-dashboard/admin-dashboard', compact('title'));
  }
}