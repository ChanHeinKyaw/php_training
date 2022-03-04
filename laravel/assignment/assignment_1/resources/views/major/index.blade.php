@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
  <div class="card">
    <div class="card-header">
      Majors
      <a href="{{ route('major.create') }}" class="btn btn-primary btn-sm float-right">Create</a>
    </div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="card-body">
      <div>
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm"> << Back</a>
      </div>
      <br>
      <table class="table table-bordered">
        <thead>
          <th>ID</th>
          <th>Major</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach ($majors as $major)
            <tr>
              <td>{{ $major->id }}</td>
              <td>{{ $major->major }}</td>
              <td>
                <form action="{{ url('major/' . $major->id . '/delete') }}" method="POST">
                  @csrf
                  <a href="{{ url('major/' . $major->id . '/edit') }}" class="btn btn-info btn-sm">Edit</a>
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
