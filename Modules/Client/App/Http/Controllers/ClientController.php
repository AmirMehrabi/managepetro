<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Client\App\Rules\ClientValidation;
use Modules\Client\App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Retrieve all clients from the database, didn't paginate because it's for demo purposes
        $clients = Client::all();

        // Return a view with the clients data
        return view('client::index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client::form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientValidation $request): RedirectResponse
    {
        // Create a new client instance
        $client = new Client();

        // Fill the client instance with validated request data
        $client->fill($request->validated());

        // Save the client to the database
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Show the specified resource.
     */
    public function show(Client $client)
    {
        return view('client::show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client::form', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientValidation $request, Client $client): RedirectResponse
    {

        $client->fill($request->validated());

        // Save the updated client to the database
        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->back();
    }
}
