@extends('teras::layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">{{ __('Office') }}
      @if(!$offices->isEmpty())
        <a class="btn btn-primary btn-sm" href="{{ route('admin.role.create') }}">Add office</a>
      @endif
    </div>
    @if($offices->isEmpty())
      <div class="card-body">
        <div class="text-center p-4" style="border: dotted 0.1rem #ededed;">
          <h5 >No Office Founded</h5>
          <a href="{{ route('admin.office.create') }}" class="btn btn-primary btn-sm">Create office</a>
        </div>
      </div>
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
            <th>Created At</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($offices as $office)
            <tr>
              <td>{{ $office->name }}</td>
              <td>{{ $office->created_at->format('d/m/Y') }}</td>
              <td class="text-right">
                <a href="{{ route('admin.office.edit', $office->id) }}" class="btn btn-sm btn-primary">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>
@endsection
