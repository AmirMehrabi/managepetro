@extends('layouts.master')

@section('breadcrumb')
<nav class="breadcrumb-style-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">{!! config('order.plural_name') !!}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ isset($order) ? 'Edit' : 'Create' }} {!! config('order.name') !!}</li>
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
                    <form class="row g-3" method="POST" action="{{ isset($order) ? route('order.update', $order) : route('order.store') }}">
                        @csrf
                        @if(isset($order))
                            @method('PUT')
                        @endif
                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Title',
                                'required' => true,
                                'placeholder' => 'Chevron Jan #1 Order',
                                'name' => 'title',
                                'value' => isset($order) ? $order->title : old('title')
                            ])
                            @endcomponent
                        </div>

                        {{-- @dd($clients) --}}
                        <div class="col-12">
                            @component('components.select', [
                                'label' => "Client",
                                'use_key' => true,
                                'required' => true,
                                'options' => $clients,
                                'name' => 'client_id',
                                'value' => isset($order) ? $order->client_id : old('client_id')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.select', [
                                'label' => "Pipeline",
                                'use_key' => true,
                                'required' => true,
                                'options' => $pipelines,
                                'name' => 'pipeline_id',
                                'value' => isset($order) ? $order->pipeline_id : old('pipeline_id')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.select', [
                                'label' => "Fuel Type",
                                'required' => true,
                                'use_key' => true,
                                'options' => [
                                    'gas' => 'Gas',
                                    'coal' => 'Coal',
                                    'oil' => 'Oil',
                                    'diesel' => 'Diesel',
                                    'other' => 'Other'
                                ],
                                'name' => 'type',
                                'value' => isset($order) ? $order->type : old('type')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Amount",
                                'required' => true,
                                'type' => 'number',
                                'postfix' => 'Liters',
                                'attributes' => [
                                    'min' => 0,
                                ],
                                'placeholder' => '30000',
                                'name' => 'amount',
                                'value' => isset($order) ? $order->amount : old('amount')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Price (PL)",
                                'required' => true,
                                'type' => 'number',
                                'postfix' => 'CAD',
                                'attributes' => [
                                    'min' => 0,
                                ],
                                'placeholder' => '75000',
                                'name' => 'price',
                                'value' => isset($order) ? $order->price : old('price')
                            ])
                            @endcomponent
                        </div>


                        <div class="col-12">
                            @component('components.text', [
                                'label' => "Expected Delivery Date",
                                'required' => true,
                                'type' => 'datetime-local',
                                'placeholder' => 'Expected Delivery Date',
                                'name' => 'expected_delivery_date',
                                'value' => isset($order) ? $order->expected_delivery_date : old('expected_delivery_date')
                            ])
                            @endcomponent
                        </div>







                        
                        <div class="col-12 text-end">
                            @component('components.cancel-button', [
                                'link' => route('order.index'),
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
