<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class AboutusController extends Controller
{
    public function index()
    {
        return view('user.pages.about.index');
    }
}
