<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SousCategory extends Model
{
    protected $table = 'souscategory';
    protected $fillable = ['souscategory','image','id_category','deleted'];


	public function mainCategory()
	{
	    return $this->belongsTo('App\Category','id_category','id');
	}

	 public function Products()
 	{
        return $this->hasMany('App\Product','id_souscategory','id');
    }
}

