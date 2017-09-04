<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::where('email', 'admin@hihi.com')-> first();
        if (!$user) {
            User::create([
                'email' => 'admin@hihi.com',
                'password' => bcrypt('123456'),
                'name' => 'Dai ca Thao',
                'role_id' => 1,
            ]);
        }
    }
}
