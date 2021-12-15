<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'Hesham Kamal',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('super_admin_pass'),
            'type' => 'super_admin',
        ]);

        $user->attachRole('super_admin');

    }//end of run

}//end of seeder
