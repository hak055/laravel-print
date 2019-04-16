<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneModel;

/**
 * @mixin Mark
 */
class Mark extends Model
{
	protected $fillable = [
        'name'
    ];
    public function PhoneModel()
    {
    	return $this->hasMany(PhoneModel::class);
    }
}
