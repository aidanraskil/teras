@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">{{ __('Role') }}
      @if(!$roles->isEmpty())
        <a class="btn btn-primary btn-sm" href="{{ route('admin.role.create') }}">Add Role</a>
      @endif
    </div>
    @if($roles->isEmpty())
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
            <th>Permissions</th>
            <th>Created At</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>
              <td>{{ $role->permissions()->pluck('name')->implode(', ') }}</td>
              <td>{{ $role->created_at->format('d/m/Y') }}</td>
              <td class="text-right">
                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
