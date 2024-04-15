@extends('customer.layout.layout')

@section('content')

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
	<hr class="soft"/>

	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Select Option</th>
				  <th>Price</th>
				  <th>Qty Price</th>

				</tr>
              </thead>
              <tbody>
				@php $qtyprice=0; $sum=0; @endphp
				@foreach($carts as $cart)
				@php
				$qtyprice = $cart->product->price * $cart->qty;

				$sum = $sum + $qtyprice;
				@endphp

				<tr>
					<td><img width="60" src="{{asset('uploads/products/'.$cart->Product->image)}}" alt=""/></td>
					<td>{{$cart->product->name}} </td>
					<td>
					  <div class="input-append">
						<input class="span1" style="max-width:34px" value="{{$cart->qty}}" placeholder="1" id="appendedInputButtons" size="16" type="number">
						<button class="btn" type="button"><i class="icon-minus"></i></button>
						<button class="btn" type="button"><i class="icon-plus"></i></button>
						<button class="btn btn-danger btn_close" data-id="{{$cart->id}}" type="button"><i class="icon-remove icon-white"></i></button>
					</div>
					</td>
					<td><input type="checkbox" name="select_product[]" cart-id="{{$cart->id}}" > </td>
					<td>{{$cart->product->price}} </td>
					<td>{{$qtyprice}} </td>

				  </tr>
				@endforeach


                <tr>
                  <td colspan="5" style="text-align:right">Total Price:	</td>
                  <td>$ {{$sum}} </td>
                </tr>

				 <tr>
                  <td colspan="4" style="text-align:right"></td>
				  <td>Pay with Eway <input type="checkbox" name="eway" style="margin-left: 20px;" id=""></td>
                  <td class="label label-important buy_product" style="text-align:center; display:block; cursor: pointer;" > <strong> Buy </strong></td>
                </tr>

				</tbody>
            </table>





	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>

</div>

@endsection

@push('footer-script')
<script>
	$('.btn_close').on('click',function(){
		if(confirm('are you sure to delete')){
			var id = $(this).data('id');
			$.ajax({
				url:'',
				data:{
					'id':id
				},
				success:function(data){
					location.reload();
				}
			});
		}
	});
</script>

@endpush

@push('footer-script')
<script>
	$('.buy_product').on('click',function(){
    var cart_id = [];
    var payment_type = '';
    if($('input[name="eway"]').is(':checked')){
      payment_type = 'eway';
    }else{
      payment_type = 'pay_person';
    }

    jQuery('input[name="select_product[]"]:checkbox:checked').each(function(i){
        cart_id[i] = $(this).attr('cart-id');
    });

    if(cart_id.length == 0){
      alert('Please select atleast one product.');
    }else{
      $.ajax({
        url:'',
        type:'post',
        data:{
          cart_id:cart_id,
          payment_type:payment_type,
          _token:'{{csrf_token()}}'
        },
        success: function(data){
            if(data.type=='eway'){
              window.location = data.url;
            }else{
              location.reload();
            }
        }
      });
    }
  });
</script>
@endpush
