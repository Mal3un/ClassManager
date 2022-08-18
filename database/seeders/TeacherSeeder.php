<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[];
        $faker = \Faker\Factory::create('vi_VN');
        $major = Major::query()->pluck('id')->toArray();
        for($i = 1; $i <= 16; $i++){
            $arr[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'address' => $faker->address. ' - ' . $faker->city,
                'email' => 100+$i . "@tc.phenikaa-uni.edu.vn",
                'password' => $faker->password,
                'gender' =>  $faker->randomElement([1,2,3]),
                'role_id' => 2,
                'major_id' => $major[array_rand($major)],
            ];

        }
        Teacher::insert($arr);
    }
}
