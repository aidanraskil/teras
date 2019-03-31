@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Kemaskini Peranan {{ $role->name }}</div>
        <div class="card-body">
          <form action="{{ route('admin.role.update', $role->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label">Nama</label> <span class="text-danger">*</span>
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $role->name }}" >
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('no_mykad') ?: $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <label for="permissions" class="form-label">Permissions</label>
            <div class="form-group form-check ml-3">
                @foreach ($permissions as $permission)
                  <input type="checkbox" name="permissions[]" class="form-check-input" value="{{ $permission->id}}" {{ $permission->id == $role->permissions->contains($permission) ? 'checked' : '' }}>
                  <label for="permissions[]" class="form-check-label">{{ $permission->name}}</label><br>
                    {{-- {{ Form::checkbox('permissions[]',  $permission->id, $role->permissions->contains($permission), ['class' => 'form-check-input'] ) }} --}}
                    {{-- {{ Form::label($permission->name, ucfirst($permission->name), ['class' => 'form-check-label']) }}<br> --}}
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Kemaskini</button>
            <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
