<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

//    public function comment()
//    {
//        return $this->belongsTo(Comment::class);
//    }
}
