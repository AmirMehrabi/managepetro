<div class="btn-group">
    <button type="submit" class="btn {{ $class ?? 'btn-dark' }}">{{ __("Save") }}</button>
    <button type="button" class="btn {{ $class ?? 'btn-dark' }} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
        <span class="visually-hidden ">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0);">{{ __("Save and close") }}</a>
    </div>
</div>