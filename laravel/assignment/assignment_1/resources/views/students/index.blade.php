@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
  <div class="card">
    <div class="card-header">
      Students
      <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-right">Create</a>
    </div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="card-body">

      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".csv" required>
        <button class="btn btn-success btn-sm">Import User Data</button>
        <a href="{{ route('export') }}" class="btn btn-warning btn-sm">Export User Data</a>
      </form>
      <br>

      <form action="{{ url('/search_data') }}" method="GET">
        @csrf
          <input type="text" name="search">
          <button class="btn btn-primary btn-sm">Search</button>
      </form>
      <br>

      <div>
        <a href="{{ route('major.index') }}" class="btn btn-primary btn-sm">Major List >> </a>
      </div>
      <br>
      <table class="table table-bordered text-center">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Major</th>
          <th>Action</th>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->phone }}</td>
              <td>
                {{ $student->major ? $student->major->major : '-' }}
              </td>
              <td>
                <form action="{{ url('delete/' . $student->id . '') }}" method="POST">
                  @csrf
                  <a href="{{ url('edit/' . $student->id . '') }}" class="btn btn-info btn-sm">Edit</a>
                  <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
