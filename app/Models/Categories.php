<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'categories_id', 'id');
    }

    public function Categories()
    {
        return $this->hasMany(categories::class, 'parent_id', 'id');
    }
    
    public function childrenCategories()
    {
        return $this->hasMany(categories::class)->with('Categories');
    }

    

}
