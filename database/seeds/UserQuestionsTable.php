<?php

use Illuminate\Database\Seeder;

class UserQuestionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("database/seeds/csv/ao_test_user_questions.csv", "r");


        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $row = [
                    'id' => $data[0],
                    'user_id' => $data[1],
                    'question_id' => $data[2],
                    'selected_answer' => $data[3],
                    'created_at' => $data[4],
                    'updated_at' => $data[5],
                ];

                DB::table('user_questions')->insert($row);
            }
            fclose($handle);
        }
    }
}
