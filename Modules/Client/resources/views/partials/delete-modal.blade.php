    <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{ $item->full_name }}?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <svg> ... </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Are you sure you want to delete <b>{{ $item->full_name }}</b>? This action is irreversible. </p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('client.destroy', $item->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light-dark">Delete</button>
                    </form>
                    <button class="btn btn-primary" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>
