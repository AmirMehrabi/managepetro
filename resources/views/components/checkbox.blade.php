@php
    $name = $name ?? null;
    $label = $label ?? 'Label';
    $id = $id ?? $name;
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $readonly = $readonly ?? false;
@endphp

{{-- <div class="row mb-3">
    @if(isset($label))
        <label class="{{ isset($label_size) ? "col-sm-{$label_size}" : "col-sm-2" }} col-form-label" for="{{ $id }}">{{ __("$label") }} @if($required) <span class="text-danger">*</span> @endif</label>
    @endif
    <div class="{{ isset($input_size) ? "col-sm-{$input_size}" : "col-sm-10" }}">
        <div class="form-check form-switch form-check-inline">
            <input 
                type="checkbox"
                class="form-check-input @if(isset($name)) @error($name) is-invalid @enderror @endif" 
                id="{{ $id }}" 
                @if(isset($name)) name="{{ $name }}" @endif 
                @if($disabled) disabled @endif
                @if($readonly) readonly @endif
                @if(isset($checked) && $checked) checked @endif
            >
            <label class="form-check-label" for="{{ $id }}">{{ __("$label") }}</label>
        </div>

        @if(isset($name))
            @error($name)
            <small class="text-danger">{{ $message }}</small>
            @enderror
        @endif
    </div>
</div> --}}

<div class="{{ isset($input_size) ? "col-sm-{$input_size}" : "col-sm-3" }} col-form-label">
    <div class="form-check form-switch form-check-inline">
        <input 
            type="checkbox"
            class="form-check-input @if(isset($name)) @error($name) is-invalid @enderror @endif" 
            id="{{ $id }}" 
            @if(isset($name)) name="{{ $name }}" @endif 
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if(isset($checked) && $checked) checked @endif
        >
        <label class="form-check-label" for="{{ $id }}">{{ __("$label") }}</label>
    </div>

    @if(isset($name))
        @error($name)
        <small class="text-danger">{{ $message }}</small>
        @enderror
    @endif
</div>