<?php

namespace app;
use DB;
use Illuminate\Database\Eloquent\Model;

class iva extends Model
{
    protected $table = 'iva';
    public static function devolver(){
		
		$iva = DB::table('iva')->get();
    	return ($iva);
    }
}
