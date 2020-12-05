<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	protected $table = 'category';
    protected $fillable = ['category','id_user','deleted'];

     public function subCategories()
 	{
        return $this->hasMany('App\SousCategory','id_category','id');
    }

    public function Products()
 	{
        return $this->hasMany('App\Product','id_souscategory','id');
    }
}


