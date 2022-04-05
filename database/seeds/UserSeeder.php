<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'phone' => '089725327373',
            'gender' => 'female',
            'address' => 'Admin House',
            'role' => 'admin',
            'image' => '-'
        ]);

        DB::table('users')->insert([
            'email' => 'kezia@mail.com',
            'name' => 'Kezia',
            'password' => bcrypt('kekez'),
            'phone' => '089725327373',
            'gender' => 'female',
            'address' => 'Kezia House',
            'role' => 'user',
            'image' => '-'
        ]);
    }
}
