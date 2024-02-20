<?php

namespace Modules\Client\App\Services;

use Modules\Client\App\Models\Client;

class ClientService
{
    public function canDelete(Client $client): bool
    {
        return $client->orders()->count() === 0;
    }
}