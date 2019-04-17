<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Printt;
/**
 * @mixin Collection
 */
class Collection extends Model
{
	protected $guarded = ['id'];

    public function Printt()
    {
    	return $this->belongsToMany(Printt::class)->withTimestamps();
    }
}
