@extends('admin.layout.layout')

@section('content')

<table class="table">
    <thead>
        <tr>
            <td>Serial No</td>
            <td>Product Name</td>
            <td>Category Name</td>
            <td>Price</td>
            <td>Extra details</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{$key+1}} </td>
                <td>{{$product->name}} </td>
                <td>
                    @if($product->category_id)
                    {{$product->category->name}}
                    @endif
                </td>
                <td>@if($product->price <30) 
                    {{'$'}} 
                    @else
                    {{'euro'}}
                    @endif
                    {{$product->price}} </td>

                    <td>
                        <button><a href="{{route('addDetail.product',$product->id)}}">Add Details</a></button>
                    </td>
                    <td><img style="height: 80px; width:80px;" src="{{asset('uploads/products/'.$product->image)}}" alt="Loading"> </td>
                    <td>
                        <a href="{{route('edit.product',$product->id)}}" style="font-size: 18px; padding:5px;"><i class="fa fa-edit"></i></a>
                        <a href="javascript::void(0)" style="font-size:17px;padding:5px;"data-id="{{$product->id}}" class="delete"><i class="fa fa-trash"></i></a>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection

@push('footer-script')
    <script>
        $('.delete').on('click',function(e){
            e.preventDefault();
            if(confirm('are you sure to delete')){
                var id= $(this).data('id');
                $.ajax({
                    url:'delProduct/'+id,
                    method:'delete',
                    data:{
                        _token:'{{csrf_token()}}',
                        'id':id,
                    },
                    success:function(data){
                        alert(data.message);
                        location.reload();
                    }
                });
            }
        });
    </script>
@endpush
