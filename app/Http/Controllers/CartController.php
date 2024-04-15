<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        if(Auth::user()){
            $user_id=auth()->user()->id;
            $carts=Cart::where('user_id',$user_id)->get();
            return view('customer.cart',compact('carts'));
        }else{
            return back();
        }
        
    }
    public function store(Request $request){
        $validated=$request->validate([
            'qty'=> ['required'],
        ]);
        $validated['product_id']=$request->product_id;
        $validated['user_id']=auth()->user()->id;

        $record=Cart::create($validated);
        return redirect()->route('cart.customer');
    }

    public function destroy(Request $request){
        $id=$request->id;
        $record=Cart::find($id);
        $record->delete();
        return response(['message'=>'Record Deleted Successfully']);
    }
}
