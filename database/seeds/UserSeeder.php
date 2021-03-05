<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Settings;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('password'),
            'cnic' => '12312-2342344-5'
        ]);

        $user->assignRole('admin');

        $settings = Settings::Create([
            'name' => 'main_logo',
        ]);
        $settings = Settings::Create([
            'name' => 'icon',
        ]);
        $settings = Settings::Create([
            'name' => 'login_logo',
        ]);
        $settings = Settings::Create([
            'name' => 'footer_left',
        ]);
        $settings = Settings::Create([
            'name' => 'footer_right',
        ]);
        $settings = Settings::Create([
            'name' => 'consign_no',
            'value' => '100',
        ]);
        $settings = Settings::Create([
            'name' => 'home_address',
            'value' => 'http://127.0.0.1:8000/',
        ]);

    }
}
