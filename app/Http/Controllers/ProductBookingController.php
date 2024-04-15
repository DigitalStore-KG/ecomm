<?php

namespace App\Http\Controllers;

use App\Models\ProductBooking;
use Illuminate\Http\Request;
use Session;
use Omnipay\Omnipay;

class ProductBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart_ids= $request->cart_id;

        $data=[];
        $amount=0;

        foreach ($cart_ids as $i => $cart_id) {
            $cart=Cart::find($cart_id);
            $amount=($amount + ($cart->product->price * $cart->qty));
            $data[$i]['user_id']=$cart->user_id;
            $data[$i]['product_id']=$cart->product_id;
            $data[$i]['qty']=$cart->qty;
            $data[$i]['payment_status']='0';
        }

        $productBooking=ProductBooking::insert($data);

        $bookedIds=ProductBooking::orderBy('id','desc')->take(count($data))->pluck('id');

        if($ProductBooking){
            Cart::destroy($cart_ids);

            if($request->payment_type=='eway'){
                Session::put('bookedIds',$bookedIds);
                $url= $this->ewayPayment($amount);
                return response(['type'=>'eway','url'=>$url]);
            }else{
                return response()->json(['type'=>'pay_person']);
            }
        }
    }

    public function ewayPayment($amount){
        $total_amount= $amount;

        $apiKey = 'F9802CoM8GrxY2nHlOewYPr8gcMu+KCsa/7Knm+5vwqTL+5BemYVlFgYxcfEgbFMGExhNI';
        $apiPassword= 'F01aYgGV';
        $apiEndpoint='Sandbox';
        $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

        /* ----transaction details------ */
        $transaction= [
            'RedirectUrl' => route('product.bookingSuccess'),
            'CancelUrl' => route('product.bookingFail'),
            'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
            'payment'=>['TotalAmount'=>$total_amount],
        ];

        $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);

        $sharedURL ='';

        if(!response->getErrors()){
            $sharedURL= $response->SharedPaymentUrl;
        }
        return $sharedURL;
    }

    public function bookingFail(){
        Session::forget('bookedIds');
        return redirect()->route('cart');
    }
    public function bookingSuccess(){
        $bookedIds=Session::get('bookedIds');
        ProductBooking::whereIn('id',$bookedIds)->update(['payment_status'=>'1']);
        Session::forget('bookedIds');
        return redirect()->route('cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductBooking $productBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBooking $productBooking)
    {
        //
    }
}
