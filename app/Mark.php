<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneModel;

class Mark extends Model
{
    public function PhoneModel()
    {
    	return $this->hasMany(PhoneModel::class);
    }
}
