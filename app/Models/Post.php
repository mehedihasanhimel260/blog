<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(category::class, 'catecory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}