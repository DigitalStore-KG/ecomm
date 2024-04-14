<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::get();
        $new_products=Product::limit(6)->latest()->get();
        return view('customer.home',compact('products','new_products'));
    }
    public function login(){
        return view('customer.login');
    }
    public function loginPermission(Request $request){
        $validated =    $request->validate([
            'email' =>  ['required','email'],
            'password'  =>  ['required'],
        ]);
        $validated['role']='user';
        dd($validated);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.createUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'  =>  ['required'],
            'email' =>  ['required','email','unique:users,email'],
            'password'  =>  ['required','min:6'],
            'confirm_password'  =>  ['required','same:password'],
        ]);
        $validated['role']='user';
        $user = User::create($validated);
        if ($user) {
            return redirect()->route('register.customer')->with('message','Registered Successfully');
        }else{
            return back()->with('error','Not registered, Try after sometime');
        }
    }

    public function productView($id){
        
        $product=Product::where('id',$id)->with('itemdetail')->first();
        $category_id=$product->category_id;
        $related_products=Product::where('category_id',$category_id)->get();
        return view('customer.productView',compact('product','related_products'));
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
