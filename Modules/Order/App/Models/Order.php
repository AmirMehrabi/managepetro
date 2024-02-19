<?php

namespace Modules\Order\App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\App\Models\Client;
use Modules\Order\App\Models\Pipeline;
use Modules\Order\App\Models\PipelineAction;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Truck\App\Models\Truck;
use Modules\Order\App\Events\OrderCreated;


class Order extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
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
                'source' => ['title'],
            ],
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

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function pipeline()
    {
        return $this->belongsTo(Pipeline::class);
    }

    public function pipelineActions()
    {
        return $this->belongsToMany(PipelineAction::class)
            ->withTimestamps()
            ->withPivot('taken_at');
    }

    public function latestPipelineAction()
    {
        return $this->pipelineActions()
            ->orderBy('taken_at', 'desc')
            ->first();
    }

    public function getStatusBadgeClassAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'warning';
                break;

            case 'approved':
                return 'info';
                break;

            case 'in_progress':
                return 'primary';
                break;

            default:
                return 'warning';
                break;
        }
    }

    public function getStatusBadgeTextAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'Pending';
                break;

            case 'approved':
                return 'Approved';
                break;

            case 'in_progress':
                return 'In Progress';
                break;

            default:
                return 'Pending';
                break;
        }
    }


    protected static function boot()
    {
        parent::boot();

        self::created(function ($order) {
            event(new OrderCreated($order));
        });
    }
}
