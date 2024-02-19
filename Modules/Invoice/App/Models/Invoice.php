<?php

namespace Modules\Invoice\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Invoice\Database\factories\InvoiceFactory;
use Modules\Order\App\Models\Order;


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

    public function getStatusBadgeClassAttribute()
    {
        switch ($this->status) {
            case 'unpaid':
                return 'danger';
                break;

            case 'paid':
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
            case 'unpaid':
                return 'Unpaid';
                break;

            case 'paid':
                return 'Paid';
                break;

            default:
                return 'Unpaid';
                break;
        }
    }


}
