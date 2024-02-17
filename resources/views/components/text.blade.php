<div class="row mb-3">
    @if(isset($label))
        <label class="{{ isset($label_size) ? "col-sm-{$label_size}" : "col-sm-2" }} col-form-label" for="{{ $name ?? '' }}">{!! __("$label") !!}@if(isset($required)  && $required == true )<span class="text-danger">*</span>@endif</label>
    @endif
    <div class="{{ isset($input_size) ? "col-sm-{$input_size}" : "col-sm-10" }}">
        <div class="input-group">
            @if (isset($prefix))
                <div class="input-group-text">{{ $prefix }}</div>
            @endif
            <input 
            type="{{ $type ?? 'text' }}"
            placeholder="{{ __("$placeholder") ?? '' }}"
            autocomplete="{{ $autocomplete ?? 'on' }}"
                @if(isset($attributes) && is_array($attributes))
                    @forelse($attributes as $key => $val)
                    {{ $key }}="{{ $val }}"
                    @empty
                    @endforelse 
                @else
                {{ $attributes ?? '' }}
                @endif
    
            @if($disabled ?? false) disabled="{{ $disabled }}" @endif
            @if($readonly ?? false) readonly="{{ $readonly }}" @endif
            @if(isset($name)) name="{{ $name }}" @endif 
            @if(isset($required) && $required == true) required  @endif
            
            class="form-control @if(isset($name)) @error($name) is-invalid @enderror @endif" 
            id="{{ isset($id) ? $id : $name}}" 
            @if(isset($name) && old($name)) 
                value="{{ old($name) }}"
            @elseif(isset($value)) 
                value="{{ $value }}" 
            @elseif(isset($is_date)) 
                value="{{ date('Y-m-d', time()) }}" 
            @endif
            >

            @if (isset($postfix))
                <div class="input-group-text">{{ $postfix }} </div>
            @endif
        </div>


    @if(isset($name))
        @error($name)
        <small class="text-danger">{{ $message }}</small>
        @enderror
    @endif
    </div>
</div>


{{-- <div class="form-group {{ $class ?? '' }}">
    @if(isset($label))
        <label for="{{ $name ?? '' }}">{!! $label !!}@if(isset($required))<span class="text-danger">*</span>@endif</label>
    @endif
    <input 
        type="{{ $type ?? 'text' }}"
        placeholder="{{ $placeholder ?? '' }}"
        autocomplete="{{ $autocomplete ?? 'on' }}"
            @if(isset($attributes) && is_array($attributes))
                @forelse($attributes as $key => $val)
                {{ $key }}="{{ $val }}"
                @empty
                @endforelse 
            @else
            {{ $attributes ?? '' }}
            @endif

        @if($disabled ?? false) disabled="{{ $disabled }}" @endif
        @if($readonly ?? false) readonly="{{ $readonly }}" @endif
        @if(isset($name)) name="{{ $name }}" @endif 
        @if(isset($required)) required @endif
        
        class="form-control @if(isset($name)) @error($name) is-invalid @enderror @endif" 
        id="{{ isset($id) ? $id : $name}}" 
        @if(isset($name) && old($name)) 
            value="{{ old($name) }}"
        @elseif(isset($value)) 
            value="{{ $value }}" 
        @elseif(isset($is_date)) 
            value="{{ date('Y-m-d', time()) }}" 
        @endif
        >

    @if(isset($name))
        @error($name)
        <small class="text-danger">{{ $message }}</small>
        @enderror
    @endif
</div>  --}}

