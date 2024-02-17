@if ($message = Session::get('alertMessage'))
    <div class="alert alert-arrow-left alert-icon-left alert-light-{{ Session::get('alertMessageClass') ?? 'info' }} alert-dismissible fade show mb-4"
        role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg
                xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="alert" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x close">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg></button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        {{ Session::get('alertMessage') }}
    </div>
@endif
