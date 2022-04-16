<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function authors() {
        return $this->belongsTo('App\Author','author_id','id');
    }
}
