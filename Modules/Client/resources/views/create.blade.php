@extends('layouts.master')

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
                    <form class="row g-3" method="POST" action="{{ isset($client) ? route('client.update', $client) : route('client.store') }}">
                        @csrf
                        @if(isset($client))
                            @method('PUT')
                        @endif
                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'First Name',
                                'required' => true,
                                'placeholder' => 'John',
                                'name' => 'first_name',
                                'value' => isset($client) ? $client->first_name : old('first_name')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Last Name',
                                'required' => true,
                                'placeholder' => 'Doe',
                                'name' => 'last_name',
                                'value' => isset($client) ? $client->last_name : old('last_name')
                            ])
                            @endcomponent
                        </div>




                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Primary Email',
                                'required' => true,
                                'placeholder' => 'johndoe@gmail.com',
                                'name' => 'primary_email',
                                'type' => 'email',
                                'value' => isset($client) ? $client->primary_email : old('primary_email')
                            ])
                            @endcomponent
                        </div>


                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Customer Portal Password',
                                'placeholder' => '********',
                                'required' => true,
                                'name' => 'password',
                                'type' => 'password',
                                
                            ])
                            @endcomponent
                        </div>


                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Primary Phone',
                                'required' => true,
                                'placeholder' => '+1 416 555 1212',
                                'name' => 'primary_phone',
                                'type' => 'text',
                                'value' => isset($client) ? $client->primary_phone : old('primary_phone')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Secondary Email',
                                'placeholder' => 'johndoe2@gmail.com',
                                'name' => 'secondary_email',
                                'type' => 'email',
                                'value' => isset($client) ? $client->primary_email : old('primary_email')
                            ])
                            @endcomponent
                        </div>


                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Secondary Phone',
                                'placeholder' => '+1 416 555 1213',
                                'name' => 'secondary_phone',
                                'type' => 'text',
                                'value' => isset($client) ? $client->secondary_phone : old('secondary_phone')
                            ])
                            @endcomponent
                        </div>



                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Organization',
                                'placeholder' => 'Chevron',
                                'name' => 'organization_name',
                                'type' => 'text',
                                'value' => isset($client) ? $client->organization_name : old('organization_name')
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Address',
                                'placeholder' => '1234 Main St',
                                'name' => 'address',
                                'type' => 'text',
                                'value' => isset($client) ? $client->latitude : old('latitude')
                            ])
                            @endcomponent
                        </div>
                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Latitude',
                                'placeholder' => '33.8273',
                                'name' => 'latitude',
                                'type' => 'text',
                                'value' => isset($client) ? $client->latitude : old('latitude')
                            ])
                            @endcomponent
                        </div>
                        <div class="col-12">
                            @component('components.text', [
                                'label' => 'Longitude',
                                'placeholder' => '-77.0364',
                                'name' => 'longitude',
                                'type' => 'text',
                            ])
                            @endcomponent
                        </div>

                        <div class="col-12 mb-3">

                            <div class="row mb-3">

                                <label class="col-sm-2 col-form-label">Notification Settings</label>
    
                                @component('components.checkbox', [
                                    'label' => 'Email Notification',
                                    'name' => 'default_checkbox',
                                    'id' => 'flexSwitchCheckDefault',
                                    'checked' => isset($client) ? $client->sms_notification : false,
                                ])
                                @endcomponent
    
                                @component('components.checkbox', [
                                    'label' => 'SMS Notification',
                                    'name' => 'default_checkbox',
                                    'id' => 'flexSwitchCheckDefault',
                                    'checked' => isset($client) ? $client->sms_notification : false,
                                ])
                                @endcomponent
                            </div>
                        </div>

                        
                        <div class="col-12 text-end">
                            @component('components.cancel-button', [
                                'link' => route('client.index'),
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
