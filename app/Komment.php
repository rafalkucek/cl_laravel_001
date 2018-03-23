<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komment extends Model
{
    protected $fillable = ['_token','author','content','article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
