@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Institution
        </h3>
    </div>

    <a href="{{ route('admin.institution.create') }}" class="btn btn-primary mb-3">
        <span class="bi bi-plus-circle"></span> 
        Create New
    </a>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Institution Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($institution as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('admin.institution.show', $item->id) }}" class="btn btn-outline-secondary btn-sm me-1">
                                    <span class="bi bi-eye">Show</span>
                                </a>
                                <a href="{{ route('admin.institution.edit', $item->id) }}" class="btn btn-secondary btn-sm me-1">
                                    <span class="bi bi-pencil">Edit</span>
                                </a> 
                                <a href="#" class="btn btn-danger btn-sm me-1" onclick="handleDestroy(`{{ route ('admin.institution.destroy', $item->id) }}`)">
                                    <span class="bi bi-trash">Hapus</span>
                                </a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>  

    <form action="" id="form-delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendors/simple-datatables/style.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
        <script>
        // Simple Datatable
        let datatable = document.querySelector('#datatable');
        new simpleDatatables.DataTable(datatable);
    </script>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        function handleDestroy(url) {
            swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat mengembalikannya",
                icon: "warning",
                buttons: ['Batal', 'Ya, hapus!'],
                dengerMode: true,
            })
            .then((confirmed) => {
                if (confirmed) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }
    </script>
@endpush