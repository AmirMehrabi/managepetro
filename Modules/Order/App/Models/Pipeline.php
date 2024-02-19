<?php

namespace Modules\Order\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\PipelineFactory;
use Modules\Order\App\Models\PipelineAction;

class Pipeline extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    protected static function newFactory(): PipelineFactory
    {
        //return PipelineFactory::new();
    }



    public function pipelineActions()
    {
        return $this->hasMany(PipelineAction::class);
    }
}
