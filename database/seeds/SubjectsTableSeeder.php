<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
        	'name' => 'general'
        ]);
        DB::table('subjects')->insert([
            'name' => 'CED',
        ]);
        DB::table('subjects')->insert([
            'name' => 'GST',
        ]);
        DB::table('subjects')->insert([
            'name' => 'TV'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Basic Math'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Showbiz Trivia'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Movies'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Bible Trivia'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Physics'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Science'
        ]);
        DB::table('subjects')->insert([
            'name' => 'GeoWorld'
        ]);
        DB::table('subjects')->insert([
            'name' => 'History and Figures'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Nature'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Literature'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Soccer'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Nigeria Polictics'
        ]);
        DB::table('subjects')->insert([
            'name' => 'Music'
        ]);
    }
}
