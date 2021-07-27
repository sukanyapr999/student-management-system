<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function studentMark()
    {
        return $this->belongsTo('App\Models\StudentMark');
    }
}
