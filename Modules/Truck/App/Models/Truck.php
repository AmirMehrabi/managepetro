<?php

namespace Modules\Truck\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Truck\Database\factories\TruckFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Order\App\Models\Order;

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

    /**
     * Get the orders assigned to this truck.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function getStatusBadgeClassAttribute()
    {
        switch ($this->status) {
            case 'inactive':
                return 'danger';
                break;

            case 'under_maintenance':
                return 'warning';
                break;

            case 'active':
                return 'success';
                break;

            default:
                return 'danger';
                break;
        }
    }

    public function getStatusBadgeTextAttribute()
    {
        switch ($this->status) {
            case 'inactive':
                return 'Inactive';
                break;

            case 'under_maintenance':
                return 'Under Maintenance';
                break;



                case 'active':
                    return 'Active';
                    break;

            default:
                return 'Inactive';
                break;
        }
    }
}
