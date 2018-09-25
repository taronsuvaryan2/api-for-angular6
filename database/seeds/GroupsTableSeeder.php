<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'name' => 'list_1'
            ],
            [
                'name' => 'list_2'
            ],
            [
                'name' => 'list_3'
            ]
        ]);
    }
}
