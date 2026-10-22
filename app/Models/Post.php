<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\User;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'image',
        'status',
        'description',
        'user_id',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
