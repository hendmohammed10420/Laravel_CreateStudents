@extends('layouts.app')
@section('studentTitle')
Update Student
@endsection
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
    </div>
@endif

<h1> Update Student</h1>

{!! Form::open(['url' => 'students','method' =>'post']) !!}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">IDno</label>
      {!!  Form::text('IDno', null,['class'=> 'form-control'. ($errors->has('IDno') ? ' is-invalid' : '')])!!}
      @error('IDno')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        {!!  Form::text('name', null,['class'=> 'form-control'. ($errors->has('name') ? ' is-invalid' : '')])!!}
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Age</label>
        {!!  Form::text('age', null,['class'=> 'form-control'. ($errors->has('age') ? ' is-invalid' : '')])!!}
        @error('age')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">track_id</label>
        {!!  Form::text('track_id', null,['class'=> 'form-control'. ($errors->has('track_id') ? ' is-invalid' : '')])!!}
        @error('track_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {!!Form::submit('Update',['class'=> 'btn btn-primary'])  !!}
    {!! Form::close() !!}
@endsection
