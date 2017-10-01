<?php

use Illuminate\Database\Seeder;

class QuestionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $handle = fopen("database/seeds/csv/ao_test_questions.csv", "r");


        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $row = [
                    'id' => $data[0],
                    'text' => $data[1],
                    'created_at' => $data[2],
                    'updated_at' => $data[3],
                ];

                DB::table('questions')->insert($row);
            }
            fclose($handle);
        }
    }
}
