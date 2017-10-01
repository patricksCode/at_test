<?php

use Illuminate\Database\Seeder;

class AnswerToQuestionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("database/seeds/csv/ao_test_answers_to_questions.csv", "r");


        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $row = [
                    'id' => $data[0],
                    'question_id' => $data[1],
                    'answer_id' => $data[2],
                    'order' => $data[3],
                ];

                DB::table('answers_to_questions')->insert($row);
            }
            fclose($handle);
        }
    }
}
