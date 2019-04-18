<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

Trait SaveTrait {

     public function scopeUnactive(Builder $builder)
    {
        $builder->where('status', 0);
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', 1);
    }
}