<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailables\Content;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'view_counts',
        'users_id',
        'new_post',
        'slug',
        'categories_id',
        'highlight_post',
        'slide_post'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function categories(){
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function imageUrl(){
        return asset('image/post/' . $this->image);
    }
}
