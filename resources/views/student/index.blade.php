@extends('layouts.app')
@section('studentTitle')
Students List
@endsection
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class=" m-4">Student Table</h1>
    <a class="btn btn-success" href="{{ url('/students/create') }}">Add Student</a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">IDno</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        <th scope="col">Auther</th>

      </tr>
    </thead>
    <tbody>
@foreach ($students as $student)

      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$student->IDno}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>

        <td>
            <a class="btn btn-primary" href="{{route('students.edit',$student->id)}}" data-toggle="modal">Update</a>
        </td>

        <td>
            <form action="{{route('students.destroy',$student->id)}}" method="post">
               @method('delete')
               @csrf
              <button type="submit" class="btn btn-danger" >
                <i class="fas fa-trash fa-2x"></i> Delete
              </button>
            </form>
        </td>

        <td>{{$student->user->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

