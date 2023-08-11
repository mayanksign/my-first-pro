<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
@extends('layouts.app')
@section('content')
<div class="container " >
<div claas=" alert alert-info">
    <a href="/author/create" class="btn btn-info">Create</a>
</div>

<table border="1px">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>AUTHOR NAME</th>
            <th>DISCRIPTION</th>
            <th>image</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $info)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$info['name']}}</td>
            <td>{{$info['description']}}</td>

            <td>
                @if($info['image'])
                <img src="{{'/images/'.$info['image']}}" height="100px">
                <!-- {{$info['image']}} -->
                @else
                <span class="text-muted">N/A</span>
                @endif
            </td>
            <td>
                <a href="/author/{{$info['id']}}/edit">Edit </a>
            </td>
            <form action="/author/{{$info['id']}}" method="post">
                &nbsp; &nbsp;
                @csrf
                @method('delete')

                <td> <button onclick="return confirm('do you want to delete this record')">DELETE</button>
            </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection