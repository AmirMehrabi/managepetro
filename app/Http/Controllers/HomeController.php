<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Truck\App\Models\Truck;
use Modules\Client\App\Models\Client;
use Modules\Invoice\App\Models\Invoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $isEmptyTruck = Truck::count() === 0;
        $isEmptyClient = Client::count() === 0;
        $invoices = Invoice::latest()->take(10)->get();

        return view('home', compact('invoices', 'isEmptyTruck', 'isEmptyClient'));
    }
}
