<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RequestsPO;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('homepage.index');
    }
}
