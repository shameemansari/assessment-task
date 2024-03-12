<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public $table = 'applications';
    public $fillable = [
        'job_id',
        'employer_id',
        'seeker_id',
        'headline',
        'cover_letter',
    ];

    public function job()
    {
        return $this->belongsTo(PostedJob::class,'job_id','id');
    }
}
