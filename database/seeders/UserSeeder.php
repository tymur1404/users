<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public const COUNT = 10000;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(self::COUNT)->create();
    }
}
