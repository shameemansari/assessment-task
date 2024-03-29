<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    public $table = 'employers';

    public $fillable = [
        'user_id',
        'company',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

  
}
