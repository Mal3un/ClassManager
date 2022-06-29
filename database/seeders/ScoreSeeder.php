<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr =[];
        for($i = 1001; $i <= 1500; $i++){
            $arr[] = [
                'student_id' => $i,
            ];

        }
        Score::insert($arr);
    }
}
