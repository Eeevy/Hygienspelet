<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'name' => str_random(10),
            'Department' => str_random(10),
            'Division' => str_random(10),
        ]);
    }
}
