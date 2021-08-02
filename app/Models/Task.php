<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function userAssign()
    {
        return $this->belongsTo(User::class, 'user_assign_id');
    }

    public function userCreator()
    {
        return $this->belongsTo(User::class, 'user_creator_id');
    }

    public function logs()
    {
        return $this->hasMany(Logs::class);
    }
}
