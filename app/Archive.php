<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    public $table = 'archive';

    public $fillable = ['title','content','image'];

}
