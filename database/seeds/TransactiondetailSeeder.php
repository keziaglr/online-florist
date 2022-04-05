<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactiondetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactiondetails')->insert([
            'transaction_id' => 1,
            'flower_id' => 1,
            'quantity' => 2
        ]);

        DB::table('transactiondetails')->insert([
            'transaction_id' => 1,
            'flower_id' => 2,
            'quantity' => 2
        ]);
    }
}
