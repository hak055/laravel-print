<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Print;
/**
 * @mixin Collection
 */
class Collection extends Model
{
    public function Print()
    {
    	return $this->belongsToMany(Print::class, 'print_collections');
    }
}