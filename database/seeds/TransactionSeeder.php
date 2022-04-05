<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            'user_id' => 2,
            'courier_id' => 1,
            'transaction_date' => '2021-04-24'
        ]);

        DB::table('transactions')->insert([
            'user_id' => 2,
            'courier_id' => 2,
            'transaction_date' => '2021-05-24'
        ]);
    }
}
