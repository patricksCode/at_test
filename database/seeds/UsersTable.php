<?php

use Illuminate\Database\Seeder;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $handle = fopen("database/seeds/csv/ao_test_users.csv", "r");


        if ($handle !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $row = [
                    'id' => $data[0],
                    'name' => $data[1],
                    'email' => $data[2],
                    'password' => $data[3],
                    'remember_token' => $data[4],
                    'created_at' => $data[5],
                    'updated_at' => $data[6],
                ];

                DB::table('users')->insert($row);
            }
            fclose($handle);
        }
    }

}
