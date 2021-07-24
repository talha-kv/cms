<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','talha@kv.com')->first();

        if(!$user)
        {
            User::create([
                'name' => 'Talha Siddiqui',
                'email' => 'talha@kv.com',
                'role' => 'admin',
                'password' => Hash::make('12345678')
            ]);
        }
    }
}
