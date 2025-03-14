<?php

namespace App\Models;

use App\Helpers\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    
}
