<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::updateOrCreate(
            [
                'name' => 'Administrator',
                'username' => 'eduarladds',
                'email' => 'cctvsolucion@gmail.com',
                'password' => bcrypt('123456'),
                'api_token' => Str::random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
