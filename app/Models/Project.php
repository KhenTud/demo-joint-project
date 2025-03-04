<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'category',
        'description'
    ];

    //  fucntion relasi dari model Project ke Model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->hasMany(Team::class);
    }
}
