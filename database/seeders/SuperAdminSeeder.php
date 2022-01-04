<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            'l_name' => 'admin',
            'password' => Hash::make('superadmin123'),
            'email' => 'kamal@superadmin.com',
            'role_id' => 1,

        ]);
    }
}
