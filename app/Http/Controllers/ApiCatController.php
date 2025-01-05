<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiCatController extends Controller
{
    public function index(){
        $cats = Cat::all();
        return CatResource::collection($cats);
    }

    public function show($id){
        $cat = Cat::find($id);

        if ($cat == null){
            return response()->json(['msg' => 'item not found'], 404);
        }
        return new CatResource($cat);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'required|string',
            'img' => 'required|image|max:10240',
        ]);

        if ($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 400); 
        }

        $imgPath = Storage::putFile("cats", $request->img);

        Cat::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $imgPath
        ]);

        return response()->json(['msg' => 'created successfully'], 201);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'desc' => 'nullable|string',
            'img' => 'nullable|image|max:2048', 
        ]);

        if ($validator->fails()){
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $cat = Cat::findOrFail($id);

        if ($request->hasFile('img')) {
            if (Storage::exists($cat->img)) {
                Storage::delete($cat->img);
            }
            $cat->img = Storage::putFile("cats", $request->img);
        }

        $cat->name = $request->name;
        $cat->desc = $request->desc;

        $cat->save();

        return response()->json(['msg' => 'Category updated successfully.'], 200);
    }

    public function delete($id)
{
    $cat = Cat::findOrFail($id);

    
    if (Storage::exists($cat->img)) {
        Storage::delete($cat->img);
    }

    
    $cat->delete();

    return response()->json(['msg' => 'Category delete successfully.'], 200);
}
}
