<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Truck\App\Models\Truck;
use Modules\Client\App\Models\Client;

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

        return view('home', compact('isEmptyTruck', 'isEmptyClient'));
    }
}
