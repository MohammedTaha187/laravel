<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if ($book == null) {
            return response()->json(['msg' => 'Item not found']);
        }
        return new BookResource($book);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:10240',
            'price' => 'required|numeric',
            'cat_id' => 'required|exists:cats,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $imgPath = Storage::putFile("books", $request->img);

        Book::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath,
            'price' => $request->price,  // إضافة الحقل price
            'cat_id' => $request->cat_id, // إضافة الحقل cat_id
        ]);

        return response()->json(['msg' => 'Book created successfully'], 201);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'price' => 'nullable|numeric',  // إضافة التحقق للـ price
            'cat_id' => 'nullable|exists:cats,id',  // إضافة التحقق للـ cat_id
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $book = Book::findOrFail($id);

        if ($request->hasFile('img')) {
            if (Storage::exists($book->img)) {
                Storage::delete($book->img);
            }
            $book->img = Storage::putFile("books", $request->img);
        }

        // تحديث الحقول
        $book->name = $request->name;
        $book->desc = $request->desc;
        $book->price = $request->price ?? $book->price;  // تحديث الـ price
        $book->cat_id = $request->cat_id ?? $book->cat_id;  // تحديث الـ cat_id

        $book->save();

        return response()->json(['msg' => 'Book updated successfully'], 200);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if (Storage::exists($book->img)) {
            Storage::delete($book->img);
        }

        $book->delete();

        return response()->json(['msg' => 'Book deleted successfully'], 204);
    }
}
