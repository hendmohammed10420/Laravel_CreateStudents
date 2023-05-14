@extends('layouts.app')
@section('title')
Create app
@endsection
@section('content')

<h1> hello from create post</h1>
{!! Form::open(array('url' => 'posts','method' =>'post')) !!}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      {!!  Form::text('title', null,['class'=> 'form-control'])!!}
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Content</label>
        {!!  Form::textarea('content', null,['class'=> 'form-control'])!!}
      </div>
    {!!Form::submit('ADD',['class'=> 'btn btn-primary'])  !!}
    {!! Form::close() !!}
@endsection
