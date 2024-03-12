<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    use HasFactory;

    public $table = 'seekers';

    public $fillable = [
        'user_id',
        'experience',
        'title',
        'resume',
        'location_id',
        'job_type_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'seeker_skills','seeker_id','skill_id');
    }

    public function jobtype()
    {
        return $this->belongsTo(JobType::class, 'job_type_id','id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id','id');
    }
}
