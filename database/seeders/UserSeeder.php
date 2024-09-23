<?php

namespace Database\Seeders;

use App\Models\TBLAdmin;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        TBLAdmin::create([
            'admin_name' => 'Administrator Doe',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
            'sub_admin' => 1,
            'created_on' => now(),
            'school_id' => 1,
        ]);
    }
}
