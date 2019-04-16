<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Printt;
/**
 * @mixin Collection
 */
class Collection extends Model
{
    public function Printt()
    {
    	return $this->belongsToMany(Printt::class, 'print_collections');
    }
}
