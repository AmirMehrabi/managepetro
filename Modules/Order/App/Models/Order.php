<?php

namespace Modules\Order\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\OrderFactory;
use Modules\Order\App\Models\Pipeline;
use Modules\Order\App\Models\PipelineAction;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): OrderFactory
    {
        //return OrderFactory::new();
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
}
