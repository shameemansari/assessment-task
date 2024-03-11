<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = config('seeder.skills');
    
        foreach ($skills as $skill) {
            Skill::updateOrCreate([
              'name' => $skill['name'],
            ]);
        }
    }
}
