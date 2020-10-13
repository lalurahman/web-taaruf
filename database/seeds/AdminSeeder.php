<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345'),
            'status' => 'admin',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insertGetId([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('12345'),
            'status' => 'user',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
