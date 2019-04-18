<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\SaveTrait;
use App\PhoneModel;

class Tovar extends Model
{
    use SaveTrait;

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
