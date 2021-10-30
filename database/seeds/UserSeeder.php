<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'staff_id' => 'OT001',
            'name' => 'Paul Adeleye',
            'email' => 'paul.adeleye@rjolad.com',
            'password' => Hash::make('octosoft'),
            'role' => 'IT',
            'status'=> '1',
        ]);
    }
}
