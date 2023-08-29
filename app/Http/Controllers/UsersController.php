<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\User\StoreRequest;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Support\Renderable;


class UsersController extends Controller
{
    public function index(): Renderable
    {
        return view('user.index');
    }

}
