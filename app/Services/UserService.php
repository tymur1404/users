<?php

namespace App\Services;


use App\Http\Requests\API\User\StoreRequest;
use App\Models\User;
use App\Models\UserImage;
use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public static function store(StoreRequest $request): string
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'city' => $data['city'],
        ]);

        $path = self::saveImage($request);

        if(!$path)
        {
            return response()->json(['message' => 'Файл не был загружен'], 400);
        }

        UserImage::create([
            'user_id' => $user->id,
            'path' => $path,
        ]);

        return response()->json(['success'=>'done']);
    }

    public static function getUsersWithImage(array $data): LengthAwarePaginator
    {
        $perPage = $data['per_page'] ?? 10;
        $users = UserRepository::getUsersWithImageCount($perPage);

        return $users;
    }

    public static function saveImage(StoreRequest $request): string|false
    {
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request?->image->extension();

            $request?->image->move(public_path('images'), $imageName);

            return 'public/images/'.$imageName;

        }
        return false;
    }
}
