<?php

namespace app;
use DB;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $table = 'planes';

    public static function devolver(){
		
		$plan = DB::table('planes')->get();
    	return ($plan);
    }

   
}
