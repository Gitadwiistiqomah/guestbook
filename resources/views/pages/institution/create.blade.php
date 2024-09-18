@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Create - Institution
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.institution.store') }}" method="POST">
                    @csrf
                <div class="form-group mb-2">
                    <label for="name" class="form-lable"> Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid  @enderror" />
    
                    @error('name') 
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"> Simpan </button>
                <a href="{{ route('admin.institution.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>  
    </section>

</div>
@endsection