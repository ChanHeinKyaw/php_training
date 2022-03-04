@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
  <div class="card">
    <div class="card-header">
      Create Major
      <a href="{{ route('major.index') }}" class="btn btn-info btn-sm float-right">Back</a>
    </div>
    <form action="{{ route('major.post-create') }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="major">Major Name</label>
          <input type="major" id="major" class="form-control" name="major" autofocus>
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
