<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StPages extends Model
{
	
    public static function selectPg(){
		$pages = DB::table('st_pages')
					->orderBy('st_pages.id')
					->get();
		return $pages;
    }
}
