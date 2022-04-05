<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CourierSeeder::class);
        $this->call(FlowerSeeder::class);
        $this->call(FlowertypeSeeder::class);
        $this->call(TransactiondetailSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
