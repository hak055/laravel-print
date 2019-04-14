<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneModel;

class Tovar extends Model
{
    public function PhoneModel()
    {
    	return $this->belongsTo(PhoneModel::class);
    }
}
