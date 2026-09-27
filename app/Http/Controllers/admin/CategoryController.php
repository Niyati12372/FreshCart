<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;

// use App\Http\Controllers\admin\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.admin-page.category.all',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.admin-page.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = null;
        if($request->file('category_image')){
            $file = $request->file('category_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_images'),$fileName);
        }
       
        Category::create([
            'name' => $request->name,
            'category_image' => $fileName
        ]);
        return redirect()->route('categories.index')->with('success','Category created successfully..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);
        return view('admin.admin-page.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = Category::find($id);
        $oldImage = 'upload/category_images/'.$category->category_image;
        $request->validate([
            'name'=>'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = $category->category_image;
        if($request->file('category_image')){
            if($category->category_image){
                unlink($oldImage);
            }
            $file = $request->file('category_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/category_images'), $fileName);
        }
         $category->update([
            'name' => $request->name,
            'category_image' => $fileName
        ]);
        return redirect()->route('categories.index')->with('success', 'Category update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id) ;
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
