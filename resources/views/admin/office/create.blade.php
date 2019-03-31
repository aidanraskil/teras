@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">{{ __('Office') }}
        </div>
        <div class="card-body">
          <form action="{{ route('admin.office.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" >
                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.office.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
