<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collection;

class Printt extends Model
{
	protected $table = 'prints';
	protected $fillable = [
        'name'
    ];
    
   public function Collection()
   {
   		return $this->belongsToMany(Collection::class, 'print_collections');
   }

}
