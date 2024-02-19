<?php

namespace Modules\Order\App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Truck\App\Models\Truck;
use Modules\Client\App\Models\Client;
use Modules\Order\App\Models\Pipeline;


class CheckOrderPrerequisitesMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $trucksExist = Truck::exists();
        $clientsExist = Client::exists();
        $pipelineExists = Pipeline::exists();

        // Redirect if any prerequisites are missing
        if (!$trucksExist || !$clientsExist || !$pipelineExists) {
            return redirect()->route('order.index')->with('alertMessage', "Please set up Trucks, Clients, and Pipelines before creating orders.")->with('alertMessageClass', 'danger');
        }

        return $next($request);
    }
}
