<?php

namespace Database\Seeders;

use App\Models\Major;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[];
        for($i = 1; $i <= 16; $i++){
            $arr[] = [
                'username' => 100+$i,
                'password' => bcrypt(100+$i),
                'role_id' => 2,
            ];
        }
        for($i = 1; $i <= 500; $i++){
            $arr[] = [
                'username' => 100100 + $i,
                'password' => bcrypt(100100 + $i),
                'role_id' => 1,
            ];
        }
        User::insert($arr);
    }
}
