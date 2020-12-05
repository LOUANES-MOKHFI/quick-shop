<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $table = 'wilaya';
    protected $fillable = ['wilaya','prix','active','deleted'];

      public function getActive(){
    return $this->active == 1 ? 'active' : 'désactive';
        
     }
}
