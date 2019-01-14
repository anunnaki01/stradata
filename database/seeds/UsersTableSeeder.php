<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'application',
            'email' => 'application@app.com',
            'password' => bcrypt('g$s3EWmX</~hWrEL'),
        ]);
    }
}
