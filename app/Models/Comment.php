<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'name', 
        'email',
        'phone',
        'content',
        'post_id', 
        'is_comment'
    ];

    public function post(){
        return $this->belongsTo(Post::class,'post_id', 'id');
    }
    
}
