<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Course;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
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
        $course = Course::query()->pluck('id')->toArray();
        $major = Major::query()->pluck('id')->toArray();
        for($i = 1; $i <= 500; $i++){
            $arr[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthdate' => $faker->date($format = 'Y-m-d', $max = '2004-01-01'),
                'address' => $faker->address. ' - ' . $faker->city,
<<<<<<< HEAD
                'email' => (100100 + $i) . "@st.phenikaa-uni.edu.vn",
=======
                'email' => (1000100 + $i) . "@st.phenikaa-uni.edu.vn",
>>>>>>> 87c9dcc6b935912706466e4df36e944843cab1d1
                'password' => $faker->password,
                'gender' =>  $faker->randomElement([1,2,3]),
                'role_id' => 1,
                'course_id' => $course[array_rand($course)],
                'major_id' => $major[array_rand($major)],
            ];
        }
        Student::insert($arr);

    }
}
