<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;
use App\Tovar;

class PhoneModel extends Model
{
    public function Mark()
    {
    	return $this->belongsTo(Mark::class);
    }

    public function Tovar()
   {
   		return $this->hasMany(Tovar::class);
   }
}
