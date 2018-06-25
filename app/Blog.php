<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table = 'blogs';

    public function categories()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
