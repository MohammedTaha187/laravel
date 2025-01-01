<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CatController extends Controller
{
    public function index(){
        $cats = Cat::paginate(3);
        return view('cats/index',[
            'cats' => $cats

        ]);
        
    }

    public function show($id){
        $cat = Cat::findOrFail($id);
        return view('cats.show',[
            'cat' => $cat
            ]);
       
    }

    public function create(){
        return view('cats.create');

    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required | string | max : 50',
            'desc' => 'required | string ',
            'img' => 'required | image | max : 2048',

        ]);

    
        $imgPath = Storage::putFile("cats", $request->img);
    
        Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath
        ]);

        return redirect(url('cats'))->with('success', 'Category create successfully.');
    }


    public function edit($id){
        $cat = Cat::findOrFail($id);
        return view('cats/edit',[
            'cat' => $cat
            ]);
       
    }
    public function update($id, Request $request)
{
    $cat = Cat::findOrFail($id);

    
    $request->validate([
        'name' => 'required|string|max:50',
        'desc' => 'required|string',
        'img' => 'nullable|image|max:2048',
    ]);

    
    if ($request->hasFile('img')) {
        
        if (Storage::exists($cat->img)) {
            Storage::delete($cat->img);
        }

        
        $cat->img = Storage::putFile("cats", $request->img);
    }

    
    $cat->name = $request->name;
    $cat->desc = $request->desc;

    
    $cat->save();

    return redirect(url('cats'))->with('success', 'Category updated successfully.');
}

    

public function delete($id)
{
    $cat = Cat::findOrFail($id);

    
    if (Storage::exists($cat->img)) {
        Storage::delete($cat->img);
    }

    
    $cat->delete();

    return redirect(url('cats'));
}


     public function search(Request $request) {
        $keyword = $request->input('keyword'); 
        $cats = Cat::where('name', 'LIKE', "%$keyword%")->get();
    
        
        return view('cats/search', [
            'keyword' => $keyword,
            'cats' => $cats,
        ]);
    }
    
     
}
 