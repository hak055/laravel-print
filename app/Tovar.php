<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhoneModel;

class Tovar extends Model
{
	protected $fillable = [
    		'name',
    		'status',
    		'print_id',
    		'phone_model_id'
    	];

    public function PhoneModel()
    {   	

    	return $this->belongsTo(PhoneModel::class);
    }
}
