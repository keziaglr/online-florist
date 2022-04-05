<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('carts')->insert([
            'user_id' => 2,
            'flower_id' => 1,
            'quantity' => 2
        ]);

        DB::table('carts')->insert([
            'user_id' => 2,
            'flower_id' => 2,
            'quantity' => 2
        ]);
    }
}
