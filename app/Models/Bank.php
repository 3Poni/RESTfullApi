<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function applications()
    {
        return $this->hasMany(Application::class, 'bank_id', 'id');
    }
}
