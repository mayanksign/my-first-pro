<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div claas=" alert alert-info">
<a href="/books/create" class="btn btn-info">Create</a>
</div>

<table border="1px" >
    <thead>
        <tr>
            <th>S.NO</th>
            <th>BOOKS TITLE</th>
            <th>price</th>
            <th>Edit</th>
            <th>DESTORY</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $info)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$info['book_title']}}</td>
            <td>{{$info['price']}}</td>
            <td><a href="/books/{{$info['id']}}/edit">Edit </a>
            </td>
            <form action="/books/{{$info['id']}}" 
            method="post">
            &nbsp; &nbsp;
                @csrf
                @method('delete')
                
               <td> <button onclick="return confirm
                ('do you want to delete this record')">DELETE</button>
            </form>
</td>
        </tr>
        @endforeach
        
    </tbody>
</table>