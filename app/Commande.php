<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
   protected $table = 'commande';
    protected $fillable = ['qte','prix','prix_total','wilaya_livraison','id_client','id_product'];
}
