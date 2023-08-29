<?php

namespace Database\Seeders;


use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class UserImageSeeder extends Seeder
{
    public const COUNT = 100000;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserImage::factory(self::COUNT)->create();

    }
}
