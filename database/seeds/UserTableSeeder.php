<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => config('app.adminEmail'),
            'email_verified_at' => now(),
            'password' => Hash::make(config('app.adminPassword')), // password
            'remember_token' => Str::random(10),
            ]);

        factory(\App\Models\User::class, 15)->create();
    }
}