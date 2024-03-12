<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostedJob extends Model
{
    use HasFactory;

    public $table = 'posted_jobs';

    public $fillable = [
        'employer_id',
        'title',
        'description',
        'years',
        'months',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'job_skills','job_id','skill_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class,'employer_id','id');
    }

    public function applicants()
    {
        return $this->hasMany(Application::class,'job_id','id');
    }
   
}
