<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public static function getUsersWithImageCount($perPage = 10, $sort = 'asc'): LengthAwarePaginator
    {

        $users = User::leftJoin('user_images', 'users.id', '=', 'user_images.user_id')
            ->select('users.id', 'users.name', 'users.city', DB::raw('COUNT(user_images.path) as image_count'))
            ->groupBy('users.id')
            ->orderBy('image_count', $sort)
            ->paginate($perPage);

        return $users;
    }
}
