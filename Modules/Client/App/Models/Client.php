<?php

namespace Modules\Client\App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Client\Database\factories\ClientFactory;
use Modules\Order\App\Models\Order;

class Client extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): ClientFactory
    {
        //return ClientFactory::new();
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
                'source' => ['first_name', 'last_name'],
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

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get all clients with their full names and IDs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getList()
    {
        $clients = Client::all(); // Retrieve all clients

        $clientData = []; // Initialize an array to store client data

        // Loop through each client and construct data array
        foreach ($clients as $client) {
            $fullName = trim($client->first_name . ' ' . $client->last_name); // Concatenate first and last name
            $clientData[] = [
                'id' => $client->id,
                'full_name' => $fullName,
            ];
        }

        return $clientData;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
