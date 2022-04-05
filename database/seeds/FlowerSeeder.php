<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flowers')->insert([
            'type_id' => 1,
            'name' => 'Red Rose',
            'price' => 10000,
            'stock' => 20,
            'description' => 'Beautiful Flower',
            'image' => '-'
        ]);

        DB::table('flowers')->insert([
            'type_id' => 1,
            'name' => 'Pink Rose',
            'price' => 12000,
            'stock' => 20,
            'description' => 'Beautiful Flower',
            'image' => '-'
        ]);

    }
}
