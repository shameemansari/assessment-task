<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerSkill extends Model
{
    use HasFactory;

    public $table = 'seeker_skills';

    public $fillable = [
        'seeker_id', 'skill_id',
    ];
}
