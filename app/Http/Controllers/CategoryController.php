<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }


    public function store(Request $request){
        // dd($request->all());

        $cat = Category::where('name', $request->category_name)->first();
        if($cat){
            return redirect('/category')->with('msg','Category already exists.');
        }

        $category = new Category();
        $category->name = $request->category_name;
        $category->description = $request->description;
        // $file = $request->file('thumbnail');
        
        // if ($file) {
            
        //     $FilePath = 'boilerplate/images/category/';
        //     $FileName = time() . '-' . $file->getClientOriginalName();
        //     $file = $file->move($FilePath, $FileName);
        //     $path = $FilePath . $FileName;
        //     $category->thumbnail = $path;
        // }

        if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()){
            $category->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnail');
        }

        $file2 = $request->file('file_attachment');
        if ($file2) {
            
            $FilePath = 'boilerplate/images/category/';
            $FileName = time() . '-' . $file2->getClientOriginalName();
            $file2 = $file2->move($FilePath, $FileName);
            $path = $FilePath . $FileName;
            $category->file_attachment = $path;
        }
        
        $catSaved = $category->save();
        $message = "Category created successfully";
        $failMessage = "Check The Credentials and Try Again";

        if($catSaved){
            return redirect ('/category')->with('msg',$message);
        }else{
            return redirect ('category/create_category')->with('msg',$failMessage);
        }

    }
    
    public function edit(Request $request){

        $categoryDetails = Category::where('id',$request->id)->first();
        if ($categoryDetails) {
            return response()->json(array('categoryDetails' => $categoryDetails));

        } else {
            return response()->json(array('message' => 'Not found'));

        }
    }

    public function update(Request $request){
        // dd($request->all());

        $updateCat = Category::find($request->cat_id);
        $updateCat->name = request('new_category_name');
        $updateCat->description = request('new_description');
        // $file = $request->file('new_thumbnail');
       
        // if ($file) {
            
        //     $FilePath = 'boilerplate/images/category/';
        //     $FileName = time() . '-' . $file->getClientOriginalName();
        //     $file = $file->move($FilePath, $FileName);
        //     $path = $FilePath . $FileName;
        //     $updateCat->thumbnail = $path;
        // }

        if($request->hasFile('new_thumbnail') && $request->file('new_thumbnail')->isValid()){
            $updateCat->media()->delete();
            $updateCat->addMediaFromRequest('new_thumbnail')->toMediaCollection('thumbnail');
        }

        $file2 = $request->file('new_file_attachment');
        // dd($file);
        if ($file2) {
            
            $FilePath = 'boilerplate/images/category/';
            $FileName = time() . '-' . $file2->getClientOriginalName();
            $file2 = $file2->move($FilePath, $FileName);
            $path = $FilePath . $FileName;
            $updateCat->file_attachment = $path;
        }
        $updateCat->save();

        if($updateCat){
            return redirect('/category');
        }
    }

    public function delete($id){

        $category = Category::where('id', '=', $id)->first();
        if ($category) {
            $category->delete();

            return redirect()->route('category.index');
        } else {
         
            return redirect()->route('category.index')->with('msg','Couldnt delete');
        }
    }


}
