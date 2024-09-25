<?php

namespace App\Models;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    public function tutorial()
    {
        return $this->hasOne(Tutorial::class);
    }
}
