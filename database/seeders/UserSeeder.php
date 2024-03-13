<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Seeker;
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
            'email_verified_at' => now(),
            'password' => Hash::make('password@123'),
        ]);

        $adminUser->syncRoles('admin');

        // $employerUser = User::create([
        //     'first_name' => 'NeoSOFT',
        //     'last_name' => 'Tech',
        //     'username' => 'employer',
        //     'email_verified_at' => now(),
        //     'email' => 'employer@itsjiff.com',
        //     'password' => Hash::make('password@123'),
        // ]);

        // Employer::create(['company' => 'Artisans Intelligence', 'user_id' => $employerUser->id]);

        // $employerUser->syncRoles('employer');

        // $seekerUser = User::create([
        //     'first_name' => 'Shameem',
        //     'last_name' => 'Ansari',
        //     'username' => 'seeker',
        //     'email_verified_at' => now(),
        //     'email' => 'seeker@itsjiff.com',
        //     'password' => Hash::make('password@123'),
        // ]);

        // Seeker::create(['user_id' => $seekerUser->id]);
        // $seekerUser->syncRoles('seeker');
    }
}
