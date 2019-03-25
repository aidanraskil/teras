@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Kemaskini {{ $user->name }}</div>
        <div class="card-body">
      <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
                <div class="form-group">
                    <label for="name" class="col-form-label">Nama</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" >
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') ?: $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') ?: $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class='form-group'>
                    <label for="role" class="col-form-label">Roles</label><br>
                    <div class="ml-4">
                    @foreach ($roles as $role)
                        <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'checked' : '' }}><label for="" class="form-check-label"></label>{{ ucfirst($role->name) }} <br>
                    @endforeach
                    </div>
                </div>
                <div class='form-group'>
                    <label for="role" class="col-form-label">Permissions</label><br>
                    <div class="ml-4">
                    @foreach ($permissions as $permission)
                        <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}" {{ $user->permissions->contains($permission) ? 'checked' : '' }}><label for="" class="form-check-label"></label>{{ ucfirst($permission->name) }} <br>
                    @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Kemaskini</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
      </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
