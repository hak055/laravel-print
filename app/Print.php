<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;

class Print extends Model
{
   public function Collection()
   {
   		return $this->belongsToMany(Collection::class, 'print_collections');
   }

}
