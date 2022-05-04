<?php

namespace Database\Seeders;

use App\Models\UserMobile;
use Illuminate\Database\Seeder;

class UserMobileTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserMobile::truncate();

        $data = [
            [
                'name' => 'EDUARDO GONZALEZ C', 'email' => 'eduardo@gmail.com',  'phone' => '+525511223344', 'date_of_birth' => '20/03/1990',
                'date_register'  => '29/04/2022', 'type_login' => 'email', 'active' => 1
            ],
            [
                'name' => 'JONH', 'email' => 'john@gmail.com',  'phone' => '+52550011223344', 'date_of_birth' => '20/03/1980',
                'date_register'  => '29/04/2022', 'type_login' => 'email', 'active' => 0
            ],
            [
                'name' => 'JAMES THOMAS', 'email' => 'thomas@gmail.com',  'phone' => '+525590087812', 'date_of_birth' => '20/03/1980',
                'date_register'  => '29/04/2022', 'type_login' => 'email', 'active' => 0
            ],
        ];

        foreach ($data as $key => $item) {
            UserMobile::updateOrCreate($item);
        }
    }
}
