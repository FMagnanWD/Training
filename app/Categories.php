<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categories extends Model
{
    public function media()
    {
        return $this->hasMany('App\Media');
    }

}
