<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTable::class);
        $this->call(UserQuestionsTable::class);
        $this->call(QuestionsTable::class);
        $this->call(AnswerToQuestionsTable::class);
        $this->call(AnswersTable::class);
    }
}
