@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
@livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('producttDeleteConfirmation', event => {
            console.log(event);
            Swal.fire({
            title: 'Apakah Kamu yakin?',
            text: "Produk "+event.detail.productt.name+" akan kamu hapus?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('producttDestroy');
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });
        })
    </script>
    <script>
        Livewire.on('producttStore', () => {
            $('#exampleModal').modal('hide');
            $('#editModal').modal('hide');
        })
    </script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">
                    @livewire('productt-form')
                </div>
                <div class="card">
                <div class="card-header">Product</div>
                <div class="card-body">
                    @livewire('productt-table')
                </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

