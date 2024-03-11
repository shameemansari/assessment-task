<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $adminUser = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@itsjiff.com',
            'password' => Hash::make('password'),
        ]);

        $adminUser->syncRoles('admin');

        // $employerUser = User::create([
        //     'first_name' => 'NeoSOFT',
        //     'last_name' => 'Technologies',
        //     'username' => 'employer',
        //     'email' => 'employer@itsjiff.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $employerUser->syncRoles('employer');

        // $seekerUser = User::create([
        //     'first_name' => 'Shameem',
        //     'last_name' => 'Ansari',
        //     'username' => 'seeker',
        //     'email' => 'seeker@itsjiff.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $seekerUser->syncRoles('seeker');
    }
}
