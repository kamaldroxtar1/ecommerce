<?php

namespace Database\Seeders;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'id'  =>  1  ,
            'name'  =>  'superadmin',
        ]);
        Roles::create([
            'id'  =>  2  ,
            'name'  =>  'admin',
        ]);
        Roles::create([
            'id'  =>  3  ,
            'name'  =>  'inventory_manager',
        ]);
        Roles::create([
            'id'  =>  4  ,
            'name'  =>  'order_manager',
        ]);
        Roles::create([
            'id'  =>  5  ,
            'name'  =>  'customer',
        ]);
    }
}
