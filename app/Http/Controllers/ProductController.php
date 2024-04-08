<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\productDetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::whereNotNull('category_id')->get();
        return view('admin.product.createProduct',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'category_id'   =>  ['required'],
            'name'          =>  ['required'],
            'price'         =>  ['required'],
        ]);
        
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $fileName=date('dmY').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads\products'),$fileName);
            $validated['image']= $fileName;
            
            
        }
        try {
            $record=Product::create($validated);
            if($record){
                return redirect()->route('create.product')->with('message','Record created successfully');
            }
        } catch (\Throwable $th) {
            $file=public_path('uploads/products/').$fileName;
            File::delete($file);
            return back()->with('error','Record not created');
        }
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        
        $product=Product::find($id);
        $categories=Category::whereNotNull('category_id')->get();
        return view('admin.product.editProduct',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $product=Product::find($id);
        $oldImage=$product->image;
        
        $validated=$request->validate([
            'category_id'   =>  ['required'],
            'name'          =>  ['required'],
            'price'         =>  ['required']
        ]);
        if($request->hasFile('image')){
            $image=$request->file('image');
            $fileName=date('dmy').time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'),$fileName);
            $validated['image']=$fileName;
        }
        try {
            $record=$product->update($validated);
            if($record){
                $file=public_path('uploads/products/').$oldImage;
                File::delete($file);
                return redirect()->route('list.product')->with('message','Updated Record Successfully');
            }
        } catch (\Throwable $th) {
            $file=public_path('uploads/products/').$fileName;
            File::delete($file);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $record=Product::find($id);
        $record->delete();
        return response(['message'=>'Record Deleted Successfully']);
    }
    public function addDetail($id){
        $product=Product::find($id);
        
        return view('admin.product.addDetail',compact('product'));
    }
    public function storeDetail(Request $request){
        $validated=$request->validate([
            'title' =>  ['required'],
            'product_id'    =>  ['required'],
            'total_items'   =>  ['required'],
            'description'   =>   ['required'],
        ]);
        $record= ProductDetail::updateOrCreate(['product_id'=>$request->product_id],$validated);
        if($record){
            return back()->with('message','updated and created successfully');
        }
        
    }
}
