<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
