<?php

namespace App\Models;

use App\Models\Difficulty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->belongsTo(Module::class, 'idModule');
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class, 'idDifficulty');
    }
}