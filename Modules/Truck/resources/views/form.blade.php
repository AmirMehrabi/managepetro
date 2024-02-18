@extends('layouts.master')

@section('breadcrumb')
<nav class="breadcrumb-style-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('truck.index') }}">{!! config('truck.plural_name') !!}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($truck) ? 'Edit' : 'Create' }} {!! config('truck.name') !!}</li>
    </ol>
</nav>
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{ __('Basic Information') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form class="row g-3" method="POST" action="{{ isset($truck) ? route('truck.update', $truck) : route('truck.store') }}">
                        @csrf
                        @if(isset($truck))
                            @method('PUT')
                        @endif
                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Name',
                                'required' => true,
                                'placeholder' => 'Road Warrior',
                                'name' => 'name',
                                'value' => isset($truck) ? $truck->name : old('name')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Driver's Name",
                                'required' => true,
                                'placeholder' => 'John Doe',
                                'name' => 'driver_name',
                                'value' => isset($truck) ? $truck->driver_name : old('driver_name')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Plate",
                                'required' => true,
                                'placeholder' => 'FSM 464',
                                'name' => 'plate',
                                'value' => isset($truck) ? $truck->plate : old('plate')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.select', [
                                'label' => "Status",
                                'use_key' => true,
                                'options' => [
                                    'active' => 'Active',
                                    'inactive' => 'Inactive',
                                    'under_maintenance' => 'Under Maintenance'
                        ],
                                'name' => 'status',
                                'value' => isset($truck) ? $truck->status : old('status')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Mileage",
                                'required' => true,
                                'placeholder' => '75000',
                                'postfix' => 'KM',
                                'type' => 'number',
                                'attributes' => [
                                    'min' => 0,
                                ],
                                'name' => 'mileage',
                                'value' => isset($truck) ? $truck->mileage : old('mileage')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Capacity",
                                'required' => true,
                                'type' => 'number',
                                'postfix' => 'Liters',
                                'attributes' => [
                                    'min' => 0,
                                ],
                                'placeholder' => '30000',
                                'name' => 'capacity',
                                'value' => isset($truck) ? $truck->capacity : old('capacity')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Model",
                                'placeholder' => 'Mercedes Axor',
                                'name' => 'model',
                                'value' => isset($truck) ? $truck->model : old('model')
                            ])
                            @endcomponent
                        </div>





                        
                        <div class="col-12 text-end">
                            @component('components.cancel-button', [
                                'link' => route('truck.index'),
                                'class' => 'btn-outline-dark',
                            ])
                            @endcomponent
                            @component('components.save-button', [
                                'class' => 'btn-dark',
                            ])
                            @endcomponent
                            {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                        </div>


                    </form>

                </div>
            </div>
        </div>



    </div>
@endsection
