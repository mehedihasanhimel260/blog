<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function posts()
    {
        return $this->belongsTo(Post::class, 'id', 'catecory_id');
    }
}