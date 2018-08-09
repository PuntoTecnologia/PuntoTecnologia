<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'img_productos';

    public function product(){
    	return $this->belongsTo('app\product')->withTrashed();
    }
}
