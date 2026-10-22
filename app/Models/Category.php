<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description'
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
