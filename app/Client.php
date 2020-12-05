<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['fname','lname','email','num_tlfn','wilaya','commune','adress','code_postale','commentaire','date_effectued','effectuer'];
}
