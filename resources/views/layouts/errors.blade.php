@foreach(['danger', 'warning', 'success', 'info'] as $msg)
    @if(session('alert-'.$msg))
        <div class="alert alert-{{ $msg }} alert-dismissible fade show my-2">{{ session('alert-'.$msg) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
    @endif
@endforeach
