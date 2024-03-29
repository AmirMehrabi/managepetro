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
        <li class="breadcrumb-item active" aria-current="page">{!! config('truck.plural_name') !!}</li>
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
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg> --}}
                        <a href="{{ route('truck.create') }}"><svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a>
                        
                        <div class="switch align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        </div>
                    </div>

                    <!-- Modal -->
                    
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
                            <h4>Name</h4>
                        </div>
                        <div class="user-email">
                            <h4>Driver Name</h4>
                        </div>
                        <div class="user-location">
                            <h4 style="margin-left: 0;">Plate</h4>
                        </div>
                        <div class="user-phone">
                            <h4 style="margin-left: 3px;">Model</h4>
                        </div>
                        <div class="user-phone">
                            <h4 style="margin-left: 3px;">Capacity</h4>
                        </div>
                        <div class="user-phone">
                            <h4 style="margin-left: 3px;">Status</h4>
                        </div>
                        <div class="user-phone">
                            <h4 style="margin-left: 3px;">Manage</h4>
                        </div>
                    </div>
                </div>
            
                @foreach($trucks as $key => $truck)
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
                                <p class="user-name" data-name="{{ $truck->name }}">{{ $truck->name }}</p>
                            </div>
                        </div>
                        <div class="user-email">
                            <p class="info-title">Email: </p>
                            <p class="usr-email-addr" data-email="{{ $truck->driver_name }}">{{ $truck->driver_name }}</p>
                        </div>
                        <div class="user-location">
                            <p class="info-title">Address: </p>
                            <p class="usr-location" data-location="{{ $truck->plate }}">{{ $truck->plate }}</p>
                        </div>
                        <div class="user-phone">
                            <p class="info-title">Manage: </p>
                            <p class="usr-ph-no" data-phone="{{ $truck->model }}">{{ $truck->model }}</p>
                        </div>
                        <div class="user-phone">
                            <p class="info-title">Manage: </p>
                            <p class="usr-ph-no" data-phone="{{ $truck->capacity }}">{{ $truck->capacity }}</p>
                        </div>

                        <div class="user-location">
                            <span
                            class="badge badge-{{ $truck->status_badge_class }}">{{$truck->status_badge_text }}</span>
                        </div>
                        <div class="action-btn">
                            <a href="{{ route('truck.edit', $truck->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <a href="#" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $key }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus delete"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                            </a>
                        </div>
                    </div>
                </div>
            
                @include('truck::partials.delete-modal', ['item' => $truck])
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