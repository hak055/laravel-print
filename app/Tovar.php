<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\SaveTrait;
use App\PhoneModel;
use App\User;
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

        static::deleted(function($tovar) {

            Event::fire('tovar.deleted', $tovar);

        });

    }
    //При выборе статуса
    public function scopeStatus($query, $value)
    {
        return $query->when(request('status'), function (Builder $builder, $status) {
            return $builder->where('status', '=', $status ?? 0);

        });
    }
    //при выборе товаров определенной марки
    public function scopeMarka($query, $value)
    {
        return $query->when(request('marka'), function (Builder $builder) {

            $model_id = PhoneModel::where('mark_id', request('marka'))->first();

            
                   return $builder->where('phone_model_id', $model_id->id ?? null);             

        });
    }

    
}
