<?php

use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list')->insert([
            'list_name' => 'Pantai Seafood Restaurant',
            'distance' => '1.9',
            'user_id' => '1'
        ]);

        DB::table('list')->insert([
            'list_name' => 'Signature By The Hill @ the Roof',
            'distance' => '2.4',
            'user_id' => '1'
        ]);

        DB::table('list')->insert([
            'list_name' => 'Cinnamon Coffee House',
            'distance' => '2.6',
            'user_id' => '2'
        ]);

        DB::table('list')->insert([
            'list_name' => 'Village Park Restaurant',
            'distance' => '3',
            'user_id' => '2'
        ]);

        DB::table('list')->insert([
            'list_name' => 'Ticklish Ribs & Wiches',
            'distance' => '4.2',
            'user_id' => '1'
        ]);

        DB::table('list')->insert([
            'list_name' => 'myBurgerLab Sunway',
            'distance' => '7.7',
            'user_id' => '1'
        ]);

        DB::table('list')->insert([
            'list_name' => 'the BULB COFFEE',
            'distance' => '2.4',
            'user_id' => '1'
        ]);

        DB::table('list')->insert([
            'list_name' => 'PappaRich',
            'distance' => '2.5',
            'user_id' => '1'
        ]);
    }
}
