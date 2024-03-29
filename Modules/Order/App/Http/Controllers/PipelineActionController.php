<?php

namespace Modules\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\App\Models\Order;
use Modules\Order\App\Models\PipelineAction;
use Modules\Order\App\Events\OrderPipelineActionAdded;

class PipelineActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $order = Order::where('slug', $request->order)->firstOrFail();
        
        $pipelineAction = PipelineAction::where('id', $request->pipeline_action)->firstOrFail();

        event(new OrderPipelineActionAdded($order, $pipelineAction));

        $order->pipelineActions()->attach($pipelineAction->id, ['taken_at' => now()]);

        
        return redirect()->back();
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
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $order = Order::where('slug', $request->order)->firstOrFail();
        
        $pipelineAction = PipelineAction::where('id', $request->pipeline_action)->firstOrFail();

        $order->pipelineActions()->detach($pipelineAction->id);
        return redirect()->back();
    }
}
