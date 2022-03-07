@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
  <div class="card">
    <div class="card-header">
      Create Student
      <a href="{{ route('students.index') }}" class="btn btn-info btn-sm float-right">Back</a>
    </div>
    <form action="{{ route('students.post-create') }}" method="POST">
      @csrf
      <div class="card-body">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="name" id="name" class="form-control" name="name" autofocus>
          @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>

        <div class="form-group">
          <label for="email_address">E-Mail Address</label>
          <input type="email" id="email_address" class="form-control" name="email" autofocus>
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>


        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="phone" id="phone" class="form-control" name="phone" autofocus>
          @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
          @endif
        </div>

        <div class="form-group">
          <label for="major">Major</label>
          <select name="major" id="major" class="form-control">
            @foreach ($majors as $major)
              <option value="{{ $major->id }}">{{ $major->major }}</option>
            @endforeach
          </select>
          @if ($errors->has('major'))
            <span class="text-danger">{{ $errors->first('major') }}</span>
          @endif
        </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary btn-block btn-sm">Submit</button>
      </div>
    </form>
  </div>
@endsection
