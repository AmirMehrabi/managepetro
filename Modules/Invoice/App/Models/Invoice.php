<?php

namespace Modules\Invoice\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoice\Database\factories\InvoiceFactory;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];
    
    protected static function newFactory(): InvoiceFactory
    {
        //return InvoiceFactory::new();
    }


    // Define relationship with orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
