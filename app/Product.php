<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','marque','designation','reference','pays_production','poids','prix','prix_promo','qte','description','image_principale','image1','image2','image3','image4','id_category','id_souscategory','id_user'];

    public function subCategories()
	{
	    return $this->belongsTo('App\SousCategory','id_souscategory','id');
	}

	public function mainCategory()
	{
	    return $this->belongsTo('App\Category','id_category','id');
	}
}

