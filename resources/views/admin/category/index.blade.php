@extends('admin.layout.layout')

@section('content')

<table class="table">
<thead>
    <tr>
        <th>S.no</th>
        <th>Category Name</th>
        <th>Parent Category Name</th>
        <th>Created Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @foreach($categories as $key => $categorie)
    <tr>
        <td>{{$key+1}} </td>
        <td>{{$categorie->name}} </td>
        <td>
            @if ($categorie->category_id)
                {{$categorie->parents->name}}
            @else
                {{'Null'}}
            @endif
        </td>
        <td>{{$categorie->created_at}} </td>
        <td>
            <a href="" style="font-size: 18px;padding:5px;"><i class="fa fa-edit"></i></a>
            <a href="javascript::void(0)" style="font-size: 18px;padding:5px;" data-id="" class="category_delete"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
        
    @endforeach
</tbody>

</table>

@endsection

{{-- @push('footer-script')
<script>
   $('.category_delete').on('click',function(){
    if(confirm('Are you sure to delete.')){
        var id=$(this).data('id');
        $.ajax({
            url:'{{route('category.destroy')}}',
            method:'post',
            data:{
                _token:'{{csrf_token()}}',
                'id':id
            },
            success:function(data){
                location.reload();
            }
        })
    }
   })
</script>
@endpush --}}