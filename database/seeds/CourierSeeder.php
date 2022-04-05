<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('couriers')->insert([
            'name' => 'JNE',
            'cost' => 20000
        ]);

        DB::table('couriers')->insert([
            'name' => 'JNT',
            'cost' => 25000
        ]);
    }
}
