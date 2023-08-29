<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Requests\API\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Services\UserService;


class UserController extends Controller
{
    public function index(IndexRequest $request) : \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $data = $request->validated();

        $users = UserService::getUsersWithImage($data);

        return UserResource::collection($users);
    }

    public function store(StoreRequest $request): string
    {
        $result = UserService::store($request);

        return $result;
    }
}
