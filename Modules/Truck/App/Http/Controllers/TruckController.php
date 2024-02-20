<?php

namespace Modules\Truck\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Truck\App\Rules\TruckValidation;
use Modules\Truck\App\Models\Truck;
use Modules\Truck\App\Services\TruckService;

class TruckController extends Controller
{

    protected $truckService;

    public function __construct(TruckService $truckService)
    {
        $this->truckService = $truckService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all trucks from the database, didn't paginate because it's for demo purposes
        $trucks = Truck::all();

        // Return a view with the trucks data
        return view('truck::index', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('truck::form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TruckValidation $request): RedirectResponse
    {
        // Create a new client instance
        $truck = new Truck();

        // Fill the client instance with validated request data
        $truck->fill($request->validated());

        // Save the client to the database
        $truck->save();

        return redirect()->route('truck.index')->with('alertMessage', "{$truck->name} was created.")->with('alertMessageClass', 'success');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('truck::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        return view('truck::form', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TruckValidation $request, Truck $truck): RedirectResponse
    {
        
        $truck->fill($request->validated());

        // Save the updated truck to the database
        $truck->save();

        return redirect()->route('truck.index')->with('alertMessage', "{$truck->full_name} was updated.")->with('alertMessageClass', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {

        if (!$this->truckService->canDelete($truck)) {
            return redirect()->back()->with("alertMessage", "Cannot delete truck with associated orders.")->with('alertMessageClass', 'danger');
        }

        $name = $truck->name;
        $truck->delete();

        return redirect()->back()->with('alertMessage', "{$name} was deleted.")->with('alertMessageClass', 'success');
    }
}
