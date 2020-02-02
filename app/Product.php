<?php

namespace App;

use App\Vrsta;
use App\Category;
use App\PostImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    

    public function slike(){
        return $this->hasMany(PostImage::class);
    }

    public function proizvodjac_auta(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    // public function proizvodjac_auta(){
    //     return $this->hasOne(Category::class, 'id', 'category_id');
    // }

    public function vrsta(){
        return $this->hasOne(Vrsta::class, 'id', 'vrste_id');
    }
}
