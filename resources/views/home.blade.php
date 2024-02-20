@extends('layouts.master')

@section('header-assets')
    <link href="{{ asset('src/assets/css/dark/components/timeline.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/timeline.css') }}" rel="stylesheet" type="text/css" />
@endsection
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
            <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
                You don't have any Clients. Create your first <a href="{{ route('client.create') }}">client</a> to be able
                to issue Orders.
            </div>
        @endif

        @if ($isEmptyTruck)
            <div class="alert alert-arrow-right alert-icon-right alert-light-warning alert-dismissible fade show mb-4"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
                You don't have any Trucks. Create your first <a href="{{ route('truck.create') }}">truck</a> to be able to
                issue Orders.
            </div>
        @endif

    </div>

    <div class="col-12  mb-4">
        <div class="card">
            <div class="card-body pt-3">
                <h5 class="card-title mb-0">Basic Usage</h5>
                <p class="card-text mb-3">A quick guide on how to use this demo.</p>

                <div class="">
                    <ol class="timeline">
                        {{-- <li class="timeline-item">
                            <span class="timeline-item-icon avatar-icon">
                                <i class="avatar">
                                    <img alt="profile" src="../src/assets/img/profile-5.jpeg">
                                </i>
                            </span>
                            <div class="new-comment">
                                <input type="text" class="form-control" placeholder="Add a comment...">
                            </div>
                        </li> --}}
                        <li class="timeline-item extra-space">
                            <span class="timeline-item-icon filled-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-message-circle">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                    </path>
                                </svg>
                            </span>
                            <div class="timeline-item-wrapper">
                                <div class="timeline-item-description">
                                    {{-- <i>
                                        <img alt="profile" src="../src/assets/img/profile-24.jpeg">
                                    </i> --}}
                                    <span class="align-self-center"><a href="#">Start Here</span> </a>
                                </div>
                                <div class="comment">
                                    <p>The amount of Fuel is unlimited in the system. When you issue an Order, an automatic
                                        invoice will be generated based on the "amount" and "price per unit" of that order.
                                    </p>
                                </div>

                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-item-icon faded-icon">
                                1
                            </span>
                            <div class="timeline-item-description">
                                {{-- <i>
                                    <img alt="profile" src="../src/assets/img/profile-20.jpeg">
                                </i> --}}
                                <span class="align-self-center">The first step is to create some <a
                                        href="{{ route('client.index') }}">Clients</a> in the system.</span>
                            </div>
                        </li>

                        <li class="timeline-item">
                            <span class="timeline-item-icon faded-icon">
                                2
                            </span>
                            <div class="timeline-item-description">
                                {{-- <i>
                                    <img alt="profile" src="../src/assets/img/profile-20.jpeg">
                                </i> --}}
                                <span class="align-self-center">Then you have to add your <a
                                        href="{{ route('truck.index') }}">Trucks</a> in the system.</span>
                            </div>
                        </li>

                        <li class="timeline-item">
                            <span class="timeline-item-icon faded-icon">
                                3
                            </span>
                            <div class="timeline-item-description">
                                {{-- <i>
                                    <img alt="profile" src="../src/assets/img/profile-20.jpeg">
                                </i> --}}
                                <span class="align-self-center">Now you are able to go ahead and issue <a
                                        href="{{ route('order.index') }}">Fuel Orders</a> for your clients.</span>
                            </div>
                        </li>

                        <li class="timeline-item extra-space">
                            <span class="timeline-item-icon filled-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-message-circle">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                    </path>
                                </svg>
                            </span>
                            <div class="timeline-item-wrapper">
                                <div class="timeline-item-description">
                                    {{-- <i>
                                        <img alt="profile" src="../src/assets/img/profile-24.jpeg">
                                    </i> --}}
                                    <span class="align-self-center"><a href="#">Explanation for orders</span> </a<
                                        </div>
                                    <div class="comment">
                                        <p>
                                            When you issue an order, there is a pipeline for it. If you go to the Show page
                                            of order you will see a timeline for the order's pipeline.
                                            By marking the "Approved by customer" Pipeline Action, the status of order will
                                            be changed to "Approved".
                                            By marking the "Invoice Paid", the status of its invoice will be changed to
                                            "Paid".
                                            By marking the "En Route", it'll automatically be assigned to one of the Trucks.
                                            By marking the "Delivered To Customer", the status will be changed to
                                            "Delivered" and the order will be detached from its driver.
                                        </p>
                                    </div>

                                </div>
                        </li>
                    </ol>

                    

                </div>
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
                                    <td class="text-center">
                                        <span
                                            class="badge badge-{{ $invoice->status_badge_class }}">{{ $invoice->status_badge_text }}</span>
                                    </td>
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
