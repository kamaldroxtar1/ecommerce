<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            'id'  =>  1  ,
            'admin_email'  =>  'kamal@admin.com',
            'notification_email'  =>  'kamal.notification@admin.com',
        ]);
    }
}
