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

<form method="post" action="/author/{{$info['id']}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
        <lable for="name"> NAME: </lable>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{$info['name']}}" required>
    </div>

    <div class="mb-3">
        <lable for="description">DESCRIPTION</lable>
        <textarea id="description" name="description" class="form-control" placeholder="Enter description" required>{{$info['description']}}</textarea>
    </div>

    @if($info['image'])
    <div class="mb-3">
        <lable>Old image</lable>
        <div class="form-control">
            <img src="{{'/images/'.$info['image']}}" width="100px" />
            <input type="hidden" name="oldimage" value="{{$info['image']}}">
        </div>
        @endif
        <div class="mb-3">
            <lable for="image">image</lable>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3 text-center">
            <button class="btn btn-success">SAVE</button>
        </div>
</form>
</div>
@endsection