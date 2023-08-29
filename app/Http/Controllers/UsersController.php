<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;


class UsersController extends Controller
{
    public function index(): Renderable
    {
        return view('user.index');
    }

}
