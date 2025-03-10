<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'project_id',
        'category'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
