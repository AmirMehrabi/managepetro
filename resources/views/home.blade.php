@extends('layouts.master')

@section('header-assets')
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

                <div class="widget-content widget-content-area pb-1">
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
                                    <span class="align-self-center"><a href="#">Start Here</span> </a>
                                </div>
                                <div class="comment">
                                    <p>The amount of Fuel is unlimited in the system. When you issue an Order, an automatic invoice will be generated based on the "amount" and "price per unit" of that order. </p>
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
                                <span class="align-self-center">The first step is to create some <a href="{{ route('client.index') }}">Clients</a> in the system.</span>
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
                                <span class="align-self-center">Then you have to add your <a href="{{ route('truck.index') }}">Trucks</a> in the system.</span>
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
                                <span class="align-self-center">Now you are able to go ahead and issue <a href="{{ route('order.index') }}">Fuel Orders</a> for your clients.</span>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-item-icon faded-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                            <div class="timeline-item-description">
                                {{-- <i>
                                    <img alt="profile" src="../src/assets/img/profile-12.jpeg">
                                </i> --}}
                                <span class="align-self-center"><a href="#">Linda Park</a> moved <a
                                        href="#">Eric Lubin</a> to <a href="#"> Technical Test</a> on
                                    <span>May 20, 2022</span></span>
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
                                        When you issue an order, there is a pipeline for it. If you go to the Show page of order you will see a timeline for the order's pipeline.
                                        By marking the "Approved by customer" Pipeline Action, the status of order will be changed to "Approved".
                                        By marking the "Invoice Paid", the status of its invoice will be changed to "Paid".
                                        By marking the "En Route", it'll automatically be assigned to one of the Trucks. 
                                        By marking the "Delivered To Customer", the status will be changed to "Delivered" and the order will be detached from its driver.
                                    </p>
                                </div>

                            </div>
                        </li>
                    </ol>

                    <div class="code-section-container">

                        <button class="btn toggle-code-snippet _effect--ripple waves-effect waves-light"><span>Code</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down toggle-code-icon">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></button>

                        <div class="code-section text-left">
                            <pre class="hljs javascript">&lt;div <span class="hljs-class"><span class="hljs-keyword">class</span></span>=<span class="hljs-string">"mt-container mx-auto"</span>&gt;
<span class="xml"><span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"timeline-line"</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>10:00<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-primary"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Updated Server Logs<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>25 mins ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>12:45<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-success"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Backup Files EOD<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>2 hrs ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>14:00<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-warning"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Send Mail to HR and Admin<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>4 hrs ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>16:00<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-info"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Conference call with Marketing Manager.<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>6 hrs ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>17:00<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-danger"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Collected documents from <span class="hljs-tag">&lt;<span class="hljs-name">a</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"javascript:void(0);"</span>&gt;</span>Sara<span class="hljs-tag">&lt;/<span class="hljs-name">a</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>9 hrs ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"item-timeline"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-time"</span>&gt;</span>16:00<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-dot t-dot-dark"</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">div</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-text"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span>&gt;</span>Server rebooted successfully<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-name">p</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"t-meta-time"</span>&gt;</span>8 hrs ago<span class="hljs-tag">&lt;/<span class="hljs-name">p</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span>

<span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span></span>                                    
<span class="xml"><span class="hljs-tag">&lt;/<span class="hljs-name">div</span>&gt;</span></span></pre>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer px-4 pt-0 border-0">
                <a href="https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188"
                    target="_blank">Visit on Themeforest.</a>
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
