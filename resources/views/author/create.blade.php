<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
@extends('layouts.app')
@section('content')
<div class="container">
@if($errors->any())
@foreach($errors->all() as $e)
<div class="btn btn-success">
  {{$e}}
</div>
  @endforeach
  @endif

<form method="post" action="/author" enctype="multipart/form-data">
@csrf 
    <div class="mb-3">
    <lable for="name"> NAME: </lable>
    <input type="text" id="name"
    name="name" class="form-control"
    placeholder="Enter name" value="{{old('name')}}" required>
</div>

<div class="mb-3">
    <lable for="description">DESCRIPTION</lable>
    <textarea id="description" 
    name="description" class="form-control" placeholder="Enter description" 
    required> {{old('description')}}  </textarea>
</div>

<div class="mb-3">
    <lable for="image">IMAGE</lable>
    <input type ="file" id="image"
    name="image" class="form-control" accept="image/*"  required>
</div>

<div class="mb-3 text-center">
    <button class="btn btn-success">SUBMIT</button>
</div>
</form>
</div>
@endsection