<div class="row mb-3">
    @if(isset($label))
        <label class="col-sm-2 col-form-label" for="{{ $name ?? '' }}">{!! __($label) !!}@if(isset($required))<span class="text-danger">*</span>@endif</label>
    @endif
    <div class="col-sm-10">
        <select class="form-control {{ $class ?? '' }} @if(isset($name)) @error($name) is-invalid @enderror @endif "
        @if(isset($attributes) && is_array($attributes))
            @forelse($attributes as $key => $val)
            {{ $key }}="{{ $val }}"
            @empty
            @endforelse
        @else
        {{ $attributes ?? '' }}
        @endif
        @if($disabled ?? false) disabled="{{ $disabled }}" @endif
        @if(isset($placeholder)) data-placeholder="{{ __("$placeholder") ?? '' }}" @endif
        @if(isset($multiple)) data-multiple="{{ $multiple }}" multiple="{{ $multiple }}" @endif
        @if($readonly ?? false) readonly="{{ $readonly }}" @endif
        @if(isset($id) || isset($name)) id="{{ $id ?? $name }}" @endif
        @if(isset($v_change)) v-on:change="{{ $v_change }}" @endif
        @if(isset($v_model)) v-model="{{ $v_model }}" @endif
        @if(isset($name)) name="{{ $name }}" @endif
        @if(isset($required)) required @endif>
        {{ $slot }}
        @if(isset($options))
            @if(isset($placeholder))<option value="">{{ __("$placeholder") ?? '' }}</option>@endif
            @foreach($options as $key => $opt)
            <option value="{{ ($use_key ?? is_string($key) ?? false) ? $key : $opt }}"
            @if($multiple ?? false)
                @if(in_array(($use_key ?? is_string($key) ?? false) ? $key : $opt, $value ?? old($name) ?? [])) selected='selected' @endif
            @else
                @if(($value ?? old($name)) == (($use_key ?? is_string($key) ?? false) ? $key : $opt)) selected='selected' @endif
            @endif>
                {{ $opt }}
            </option>
            @endforeach
        @endif
    </select>
    @if(isset($v_error))
    <small class="text-danger" v-if="{{ $v_error }}" v-text="{{ $v_error }}"></small>
    @elseif(isset($v_model))
    <small class="text-danger" v-if='{{ str_replace('form_data.', 'form_errors["', $v_model) }}"]' v-text='{{ str_replace('form_data.', 'form_errors["', $v_model) }}"]'></small>
    @endif
    @if(isset($name))
        @error($name)
        <small class="text-danger">{{ $message }}</small>
        @enderror
    @endif
    </div>
</div>



{{-- <div class="form-group ">
    @if(isset($label))
    <label for="{{ $name ?? 'name' }}">{!! __($label) !!}@if(isset($required))<span class="text-danger">*</span>@endif</label>
    @endif
    <select class="form-control {{ $class ?? '' }} @if(isset($name)) @error($name) is-invalid @enderror @endif "
        @if(isset($attributes) && is_array($attributes))
            @forelse($attributes as $key => $val)
            {{ $key }}="{{ $val }}"
            @empty
            @endforelse
        @else
        {{ $attributes ?? '' }}
        @endif
        @if($disabled ?? false) disabled="{{ $disabled }}" @endif
        @if(isset($placeholder)) data-placeholder="{{ $placeholder }}" @endif
        @if(isset($multiple)) data-multiple="{{ $multiple }}" multiple="{{ $multiple }}" @endif
        @if($readonly ?? false) readonly="{{ $readonly }}" @endif
        @if(isset($id) || isset($name)) id="{{ $id ?? $name }}" @endif
        @if(isset($v_change)) v-on:change="{{ $v_change }}" @endif
        @if(isset($v_model)) v-model="{{ $v_model }}" @endif
        @if(isset($name)) name="{{ $name }}" @endif
        @if(isset($required)) required @endif>
        {{ $slot }}
        @if(isset($options))
            @if(isset($placeholder))<option value="">{{ $placeholder }}</option>@endif
            @foreach($options as $key => $opt)
            <option value="{{ ($use_key ?? is_string($key) ?? false) ? $key : $opt }}"
            @if($multiple ?? false)
                @if(in_array(($use_key ?? is_string($key) ?? false) ? $key : $opt, $value ?? old($name) ?? [])) selected='selected' @endif
            @else
                @if(($value ?? old($name)) == (($use_key ?? is_string($key) ?? false) ? $key : $opt)) selected='selected' @endif
            @endif>
                {{ $opt }}
            </option>
            @endforeach
        @endif
    </select>
    @if(isset($v_error))
    <small class="text-danger" v-if="{{ $v_error }}" v-text="{{ $v_error }}"></small>
    @elseif(isset($v_model))
    <small class="text-danger" v-if='{{ str_replace('form_data.', 'form_errors["', $v_model) }}"]' v-text='{{ str_replace('form_data.', 'form_errors["', $v_model) }}"]'></small>
    @endif
    @if(isset($name))
        @error($name)
        <small class="text-danger">{{ $message }}</small>
        @enderror
    @endif
</div> --}}
