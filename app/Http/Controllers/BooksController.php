<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Symfony\Contracts\Service\Attribute\Required;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = books::all();
        // return view("books.index", compact('data'));
        return response()->json([
            'info'=> $data,
            'msg'=>'done'
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = books::all();
        return view("books/create", compact('data'));
        return response()->json([
            'info'=>true,
            'msg'=>'done'
        ],200);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'book_title'=>'required|min:5|unique:books',
            'price'=>'numeric|min:1'
        ]);
        
        $info = [
            'book_title' => $request->book_title,
            'price' => $request->price
        ];
        Books::create($info);
        return redirect('/books');
        return response()->json([
            'info'=>true,
            'msg'=>'done'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(books $books, $id)
    {
        //
        $info = $books->find($id);
        // return view("books.edit", compact('info'));
         return response()->json()([
            'info'=>$info,
            'msg'=>'done'
         ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, books $books, $id)
    {
        $info = $books->find($id);
        $info->book_title = $request->book_title;
        $info->price = $request->price;
        $info->save();
        dd($info);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(books $books,$id)
    {
        //
        $books=$books->find($id);
        $books->delete();
        return redirect('books');
    }
}
