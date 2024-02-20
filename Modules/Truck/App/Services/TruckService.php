<?php

namespace Modules\Truck\App\Services;

use Modules\Truck\App\Models\Truck;

class TruckService
{
    public function canDelete(Truck $truck): bool
    {
        return $truck->orders()->count() === 0;
    }
}