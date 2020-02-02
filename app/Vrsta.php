<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vrsta extends Model
{
    protected $table ="vrste";
    protected $guarded = [];
    public $timestamps = false;
}
