<?php

namespace App\Http\Controllers;

use App\Models\authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("author.index", ['data' => authors::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = authors::all();
        return view("author/create", compact('data'));
    return redirect ('/author');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->file('image')->getClientOriginalName());
        $file = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move('images/', $file);

        $aobj = new authors();
        $aobj->name = $request->name;
        $aobj->description = $request->description;
        $aobj->image = $file;
        $aobj->save();


        // dd($aobj);
        // $info=[
        //     'name'=> $request->name,
        //     'description' =>$request->description,
        //     'img'=>$img

        // ];
        // authors::create($info);
        return redirect ('/author');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit(authors $authors, $id)
    {
        //
        return view('author.edit', ['info' => $authors->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, authors $aobj, $id)
    {
        //
        $file = '';
        if ($request->file('image')) {
            $file = $request->file('image')->getClientOriginalName();
            if ($request->oldimage) {
                unlink('images/' . $request->oldimage);
            }

            $file = time() . "_" . $file;
            $request->file('image')->move('images/', $file);
        } else {
            $file = $request->oldimage ?? '';
        }

        $aobj = $aobj->find($id);
        $aobj->name = $request->name;
        $aobj->description = $request->description;
        $aobj->image = $file;
        $aobj->save();
    return redirect ('/author');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy( authors $aobj,$id)
    {
        //
        $aobj=$aobj->find($id);
        if ($aobj->image ) {
            unlink('images/'. $aobj->image); 
    }
    $aobj->delete();
    return redirect ('/author');
}  
}