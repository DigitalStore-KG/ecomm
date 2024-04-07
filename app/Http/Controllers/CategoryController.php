<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::whereNull('category_id')->get();
        return view('admin.category.createCategory',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            'name'=>    ucwords($request->name),
            'category_id'=> $request->category_id,
        ];
        $record= Category::create($data);
        if($record){
            return back()->with('message','Record created successfully');
        }else{
            return back()->with('error','Record is not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,$id)
    {
        $category=  Category::find($id);
        
        $categories=    Category::whereNull('category_id')->get();
        return view('admin.category.editCategory',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data=[
            'name'=>$request->name,
            'category_id'=> $request->category_id,
        ];
        $record=$category->update($data);
        if($record){
            return redirect()->route('list.category')->with('message','Record updated successfully');
        }else{
            return back()->with('error','Record is not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $record=Category::find($id);
        $record->delete();
        return response()->json('success');
    }
}
