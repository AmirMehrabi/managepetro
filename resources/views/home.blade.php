@extends('layouts.master')
@section('breadcrumb')
<nav class="breadcrumb-style-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
</nav>
@endsection

@section('content')
    
<div class="col-12">
    @if ($isEmptyClient)
    <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
        You don't have any Clients. Create your first <a href="{{ route('client.create') }}">client</a> to be able to issue Orders.
    </div>
    @endif

    @if ($isEmptyTruck)
    <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
        You don't have any Trucks. Create your first <a href="{{ route('truck.create') }}">truck</a> to be able to issue Orders.
    </div>
    @endif

</div>

<div class="col-xl-3 col-lg-6 col-md-6  mb-4">
    <div class="card bg-primary">
        <div class="card-body pt-3">
            <h5 class="card-title mb-3">Card Title</h5>
            <p class="card-text">Powerful CRM admin dashboard template based on Bootstrap and Sass for all kind of back-end projects.</p>
        </div>
        <div class="card-footer px-4 pt-0 border-0">
            <a href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188" target="_blank">Visit on Themeforest.</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6  mb-4">
    <div class="card bg-secondary">
        <div class="card-body pt-3">
            <h5 class="card-title mb-3">Card Title</h5>
            <p class="card-text">Powerful CRM admin dashboard template based on Bootstrap and Sass for all kind of back-end projects.</p>
        </div>
        <div class="card-footer px-4 pt-0 border-0">
            <a href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188" target="_blank">Visit on Themeforest.</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6  mb-4">
    <div class="card bg-dark">
        <div class="card-body pt-3">
            <h5 class="card-title mb-3">Card Title</h5>
            <p class="card-text">Powerful CRM admin dashboard template based on Bootstrap and Sass for all kind of back-end projects.</p>
        </div>
        <div class="card-footer px-4 pt-0 border-0">
            <a href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188" target="_blank">Visit on Themeforest.</a>
        </div>
    </div>
</div>

<div class="col-xl-3 col-lg-6 col-md-6  mb-4">
    <div class="card bg-danger">
        <div class="card-body pt-3">
            <h5 class="card-title mb-3">Card Title</h5>
            <p class="card-text">Powerful CRM admin dashboard template based on Bootstrap and Sass for all kind of back-end projects.</p>
        </div>
        <div class="card-footer px-4 pt-0 border-0">
            <a href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188" target="_blank">Visit on Themeforest.</a>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Latest Invoices</h4>
                </div>          
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order</th>
                            <th>Total Amount</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th class="text-center">Status</th>
                            {{-- <th class="text-center">Action</th> --}}
                        </tr>
                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                    </thead>
                    <tbody>

                        @forelse ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->order->title }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>{{ $invoice->issue_date }}</td>
                            <td>{{ $invoice->due_date }}</td>
                            {{-- <td>320</td> --}}
                            <td class="text-center"><span class="badge badge-success">Approved</span></td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">There aren't any invoices in the system yet.</td>
                            </tr>
                        @endforelse

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection