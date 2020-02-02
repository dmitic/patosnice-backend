<?php

namespace App;

use App\PostType;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function tip(){
        return $this->hasOne(PostType::class, 'id', 'tip_id');
    }
}
