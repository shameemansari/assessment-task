<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public $table = 'skills';

    public $fillable = [
        'name'
    ];

    public function jobs()
    {
        return $this->belongsToMany(PostedJob::class,'job_skills','skill_id','job_id');
    }

    public function seekers()
    {
        return $this->belongsToMany(Seeker::class,'seeker_skills','skill_id','seeker_id');
    }
}
