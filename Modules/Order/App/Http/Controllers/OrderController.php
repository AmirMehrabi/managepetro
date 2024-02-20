<?php

namespace Modules\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\App\Rules\OrderValidation;
use Modules\Order\App\Models\Order;
use Modules\Order\App\Models\Pipeline;
use Modules\Order\App\Models\PipelineAction;
use Modules\Client\App\Models\Client;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.prerequisites')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all trucks from the database, didn't paginate because it's for demo purposes
        $orders = Order::all();

        // Return a view with the trucks data
        return view('order::index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $clients = Client::pluck('first_name', 'id');
        $pipelines = Pipeline::pluck('name', 'id');

        return view('order::form', compact('clients', 'pipelines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderValidation $request): RedirectResponse
    {

        // dd($request->validated());
        // Create a new order instance
        $order = new Order();

        // Fill the order instance with validated request data
        $order->fill($request->validated());

        // Save the order to the database
        $order->save();

        return redirect()->route('order.index')->with('alertMessage', "{$order->title} was created.")->with('alertMessageClass', 'success');
    }

    /**
     * Show the specified resource.
     */
    public function show(Order $order)
    {

        // Inside your controller method
        $firstUndonePipelineAction = null;
        $latestDonePipelineAction = null;

        foreach ($order->pipeline->pipelineActions as $pipelineAction) {
            if (!$order->pipelineActions->contains($pipelineAction) && !$firstUndonePipelineAction) {
                $firstUndonePipelineAction = $pipelineAction;
            }

            if ($order->pipelineActions->contains($pipelineAction)) {
                $latestDonePipelineAction = $pipelineAction;
            }
        }
        return view('order::show', compact('order', 'firstUndonePipelineAction', 'latestDonePipelineAction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $clients = Client::pluck('first_name', 'id');
        $pipelines = Pipeline::pluck('name', 'id');
        return view('order::form', compact('order', 'clients', 'pipelines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderValidation $request, Order $order): RedirectResponse
    {
        // ATM we don't have the ability to update orders
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
