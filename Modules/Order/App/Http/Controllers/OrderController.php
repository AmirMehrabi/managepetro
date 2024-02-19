<?php

namespace Modules\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\App\Rules\OrderValidation;
use Modules\Order\App\Models\Order;
use Modules\Order\App\Models\Pipeline;
use Modules\Client\App\Models\Client;

class OrderController extends Controller
{
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
    public function show($id)
    {
        return view('order::show');
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
        $order->fill($request->validated());

        // Save the updated order to the database
        $order->save();

        return redirect()->route('order.index')->with('alertMessage', "{$order->name} was updated.")->with('alertMessageClass', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}