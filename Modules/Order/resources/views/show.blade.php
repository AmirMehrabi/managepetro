@extends('layouts.master')


@section('header-assets')
    <link href="{{ asset('src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/dark/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/timeline.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<nav class="breadcrumb-style-one" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">{!! config('order.plural_name') !!}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Show {!! config('order.name') !!}</li>
    </ol>
</nav>
@endsection

@section('breadcrumb')
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{!! config('order.plural_name') !!}</li>
        </ol>
    </nav>
@endsection

@section('content')

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $order->title }}</h5>
                <p class="card-text"><strong>Order ID:</strong> {{ $order->id }}</p>
                <p class="card-text"><strong>Customer Name:</strong> {{ $order->client->full_name }}</p>
                <p class="card-text"><strong>Total Amount:</strong> ${{ number_format($order->invoice->total_amount, 2) }} <span
                    class="badge badge-{{ $order->invoice->status_badge_class }}">{{$order->invoice->status_badge_text }}</span></p>
                <p class="card-text"><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                <p class="card-text"><strong>Expected Delivery:</strong> {{ $order->expected_delivery_date }}</p>
    
                <p class="card-text"><strong>Approved Date:</strong> {{ $order->approved_date }}</p>
                <p class="card-text"><strong>Actual Delivery Date:</strong> {{ $order->delivery_date }}</p>
                <p class="card-text"><strong>Status:</strong> <span
                        class="badge badge-{{ $order->status_badge_class }}">{{ $order->status_badge_text }}</span></p>
                <!-- Add more relevant information as needed -->
            </div>
        </div>
    </div>


    <div class="col-12 col-md-6">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Pipeline Actions</h5>
    
    
                <ul class="breadcrumb wizard">
                    @php
                        $pipelineActions = $order->pipeline->pipelineActions;
                        $totalActions = $pipelineActions->count();
                        $completedActions = $order->pipelineActions->count();
                        $i = 0;
                    @endphp
    
    
                </ul>
                <div class="mt-container mx-auto">
                    <div class="timeline-line">
                        @foreach ($pipelineActions as $index => $action)
                            @php
                                if ($order->pipelineActions->contains($action)) {
                                    $orderPipelineAction = $order->pipelineActions->firstWhere('id', $action->id);
                                }
    
                            @endphp
                            <div class="item-timeline">
                                <p class="t-time">
                                    {{ isset($orderPipelineAction) ? $orderPipelineAction->created_at->format('h:s') : '' }}
                                </p>
                                <div class="t-dot t-dot-{{ $order->pipelineActions->contains($action) ? 'success' : 'info' }}">
                                </div>
                                <div class="t-text">
                                    <p>{{ $action->name }}</p>
                                    {{-- <p class="t-meta-time">25 mins ago</p> --}}
                                </div>
                            </div>
    
                            @php
                                unset($orderPipelineAction);
                            @endphp
                        @endforeach
    
    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Pipeline Actions to be completed</h5>
    
    
                <ul class="list-group d-flex justify-content-between">
                    @foreach ($order->pipeline->pipelineActions as $pipelineAction)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $pipelineAction->name }}
                
                        @if ($pipelineAction === $firstUndonePipelineAction)
                            <form action="{{ route('pipeline-action.store', ['order' => $order->slug, 'pipeline_action' => $pipelineAction->id]) }}" method="POST" style="margin-bottom: 0px;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">Mark as done</button>
                            </form>
                        @elseif ($pipelineAction === $latestDonePipelineAction)
                        <div class="d-flex gap-1">
                            <span class="badge bg-success">Done</span>
                            <form
                                action="{{ route('pipeline-action.destroy', ['order' => $order->slug, 'pipeline_action' => $latestDonePipelineAction->id]) }}"
                                method="POST" style="margin-botto: 0px;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="pipeline_action_id" value="{{ $latestDonePipelineAction->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Undone Action</button>
                            </form>
                        </div>
    
                        @endif
                    </li>
                @endforeach
    
    
                    {{-- @if (!is_null($lastDonePipelineAction))
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $lastDonePipelineAction->name }}
                            <form
                                action="{{ route('pipeline-action.destroy', ['order' => $order->slug, 'pipeline_action' => $lastDonePipelineAction->id]) }}"
                                method="POST" style="margin-botto: 0px;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="pipeline_action_id" value="{{ $lastDonePipelineAction->id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Undone</button>
                            </form>
                        </li>
                    @endif --}}
                </ul>
            </div>
        </div>
    </div>
</div>





@endsection



@section('footer-assets')
    <script src="{{ asset('src/assets/js/custom.js') }}"></script>
    <script src="{{ asset('src/plugins/src/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('src/assets/js/apps/contact.js') }}"></script>
@endsection
