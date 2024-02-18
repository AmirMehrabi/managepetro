<?php

namespace Modules\Truck\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Truck\Database\factories\TruckFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Truck extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): TruckFactory
    {
        //return TruckFactory::new();
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /* Get the route key for the model.
    *
    * @return string
    */
   public function getRouteKeyName()
   {
       return 'slug';
   }
}
