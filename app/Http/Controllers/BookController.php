<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.list', compact('books'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'level' => 'required|string|max:255',

        ]);

        // $fileName = time().'.'.$request->thesis_file->extension();
        // $request->thesis_file->move(public_path('uploads'), $fileName);
        if($request->thesis_file){
            $file=$request->file('thesis_file');
            $newName=uniqid().time().".".$file->extension();
            $file->storeAs('public/books',$newName);

        }

        $book=New Book();
        $book->title=$request->title;
        $book->content=$request->content;
        $book->level=$request->level;
        $book->thesis_file=$newName;
        $book->save();

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request,$id)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'level' => 'required|string',
            // 'thesis_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->content = $request->content;
        $book->level = $request->level;

        if($request->thesis_file){
            $file=$request->file('thesis_file');
            $newName=uniqid().time().".".$file->extension();
            $file->storeAs('public/books',$newName);

        }

        $book->save(); // Save the updated book

        return redirect()->route('book.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $book=Book::find($id);
        if($book){

            $book->delete();
            Storage::delete('public/books/'.$book->thesis_file);

        }

        return redirect()->route('book.index');
        //
    }
}
