@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
  <div class="card">
    <div class="card-body">
      <input type="text" name="id" id="id" class="id" hidden>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" id="name" class="form-control name" name="name" value="{{ old('name') }}">
        <span id="nameField" class="text-danger"></span>
      </div>

      <div class="form-group">
        <label for="email_address">E-Mail Address</label>
        <input type="email" id="email_address" class="form-control email" name="email" value="{{ old('email') }}">
        <span id="emailField" class="text-danger"></span>
      </div>


      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" id="phone" class="form-control phone" name="phone" value="{{ old('phone') }}">
        <span id="phoneField" class="text-danger"></span>
      </div>

    </div>
    <div class="card-footer">
      <button class="btn btn-primary btn-sm" onclick="createStudentData()">Register</button>
      <button class="btn btn-info btn-sm float-right" onclick="updateStudentData()">Update</button>
    </div>
  </div>
  <br>
  <br>
  <div class="card">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="card-body">
      <br>
      <table class="table table-bordered text-center">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Action</th>
        </thead>
        <tbody id="studentList">
        </tbody>
      </table>
    </div>
  </div>
@endsection
