<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\SaveTrait;
use App\PhoneModel;
use Event;

class Tovar extends Model
{
    use SaveTrait;//трайт для вывода товаров по статусу
    

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

//сохранение log при обновлении записи из TovarEvent
    public static function boot() {

        parent::boot();

        static::updated(function($tovar) {

            Event::fire('tovar.updated', $tovar);

        });

    }
}
