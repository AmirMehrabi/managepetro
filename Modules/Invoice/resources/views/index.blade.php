@extends('layouts.master')


@section('header-assets')
<link href="{{ asset('src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('src/assets/css/dark/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('src/assets/css/light/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<nav class="breadcrumb-style-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">{!! config('invoice.plural_name') !!}</li>
    </ol>
</nav>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="widget-content searchable-container list">

            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                    <form class="form-inline my-2 my-lg-0">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input type="text" class="form-control product-search" id="input-search" placeholder="Search...">
                        </div>
                    </form>
                </div>

                <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                    <div class="d-flex justify-content-sm-end justify-content-center">                        
                        <div class="switch align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="searchable-items list">
                <div class="items items-header-section">
                    <div class="item-content">
                        <div class="d-inline-flex">
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check form-check-primary me-0 mb-0">
                                    <input class="form-check-input inbox-chkbox" id="contact-check-all" type="checkbox">
                                </div>
                            </div>
                            <h4>#</h4>
                        </div>
                        <div class="user-email">
                            <h4>Order</h4>
                        </div>
                        <div class="user-location">
                            <h4 style="margin-left: 0;">Total Amount</h4>
                        </div>
                        <div class="user-location">
                            <h4 style="margin-left: 0;">Issue Date</h4>
                        </div>
                        <div class="user-location">
                            <h4 style="margin-left: 0;">Due Date</h4>
                        </div>
                        <div class="user-phone">
                            <h4 style="margin-left: 3px;">Status</h4>
                        </div>

                    </div>
                </div>
            
                @foreach($invoices as $key => $invoice)
                <div class="items">
                    <div class="item-content">
                        <div class="user-profile">
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check form-check-primary me-0 mb-0">
                                    <input class="form-check-input inbox-chkbox contact-chkbox" type="checkbox">
                                </div>
                            </div>
                            {{-- <img src="../src/assets/img/profile-{{ $loop->index % 5 + 1 }}.jpeg" alt="avatar"> --}}
                            <div class="user-meta-info">
                                <p class="user-name" data-name="{{ $invoice->invoice_number }}">{{ $invoice->invoice_number }}</p>
                            </div>
                        </div>
                        <div class="user-email">
                            <p class="info-title">Email: </p>
                            <p class="usr-email-addr" data-email="{{ $invoice->order->title }}">{{ $invoice->order->title }}</p>
                        </div>
                        <div class="user-email">
                            <p class="info-title">Email: </p>
                            <p class="usr-email-addr" data-email="{{ $invoice->total_amount ?? 'N/A' }}">{{ $invoice->total_amount ?? 'N/A' }}</p>
                        </div>

                        <div class="user-email">
                            <p class="info-title">Email: </p>
                            <p class="usr-email-addr" data-email="{{ $invoice->issue_date ?? 'N/A' }}">{{ $invoice->issue_date ?? 'N/A' }}</p>
                        </div>

                        <div class="user-email">
                            <p class="info-title">Email: </p>
                            <p class="usr-email-addr" data-email="{{ $invoice->due_date ?? 'N/A' }}">{{ $invoice->due_date ?? 'N/A' }}</p>
                        </div>
                        <div class="user-location">
                            <span
                            class="badge badge-{{ $invoice->status_badge_class }}">{{$invoice->status_badge_text }}</span>
                        </div>

                    </div>
                </div>
            
                @endforeach
            </div>
            
            

        </div>
    </div>


@endsection



@section('footer-assets')
<script src="{{ asset('src/assets/js/custom.js') }}"></script>
<script src="{{ asset('src/plugins/src/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('src/assets/js/apps/contact.js') }}"></script>
@endsection