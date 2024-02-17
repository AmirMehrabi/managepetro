<?php

namespace Modules\Client\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Client\Database\factories\ClientFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): ClientFactory
    {
        //return ClientFactory::new();
    }


    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name']
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


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
