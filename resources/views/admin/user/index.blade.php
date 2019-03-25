@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">{{ __('Role') }}
      @if(!$users->isEmpty())
        <a class="btn btn-primary btn-sm" href="{{ route('admin.role.create') }}">Add Role</a>
      @endif
    </div>
    @if($users->isEmpty())
      baba
    @else
      <div class="card-body">
        <form class="form-inline" action="{{ route('admin.role.index') }}" method="GET">
          <label class="sr-only" for="name">Name</label>
          <input type="text" class="form-control mr-2" name="name" placeholder="Name">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>
      <table class="table mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Roles</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td class="text-capitalize">{{ $user->roles()->pluck('name')->implode(', ') }}</td>
              <td class="text-right">
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
