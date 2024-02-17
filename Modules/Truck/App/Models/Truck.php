<?php

namespace Modules\Truck\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Truck\Database\factories\TruckFactory;

class Truck extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): TruckFactory
    {
        //return TruckFactory::new();
    }
}
