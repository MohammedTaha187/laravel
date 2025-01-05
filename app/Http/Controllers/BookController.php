<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $books = Book::paginate(3);
        return view('books/index',[
            'books' => $books

        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cat::all();
        return view('books.create',[
            'cats' => $cats 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | max : 50',
            'desc' => 'required | string ',
            'price'=> 'required | numeric',
            'cat_id'=> 'required | exists:cats,id',
            'img' => 'required | image | max : 2048',

        ]);

    
        $imgPath = Storage::putFile("books", $request->img);
    
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
            'price' => $request->price,
            'cat_id' => $request->cat_id,
        ]);

        return redirect(url('books'))->with('success', 'Category create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show',[
            'book' => $book
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
