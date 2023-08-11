<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@if($errors->any())
@foreach($errors->all() as $e)
<div class="btn btn-success">
  {{$e}}
</div>
  @endforeach
  @endif

<form method="post" action="/books">
@csrf 
    <div class="mb-3">
    <lable for="books_title"> Title: </lable>
    <input type="text" id="book_title"
    name="book_title" class="form-control"
    placeholder="Enter title" value="{{old('book_title')}}"required>
</div>

<div class="mb-3">
    <lable for="price">Price</lable>
    <input type="number" id="price"
    name="price" class="form-control"
    placeholder="Enter price" value="{{old('price')}}" required>
</div>
<div class="mb-3 text-center">
    <button class="btn btn-success">save</button>
</div>
</form>