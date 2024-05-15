<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDetail;

class Product extends Model
{
    use HasFactory;
    protected $image=null;
    protected $fillable=[
        'category_id',
        'name',
        'image',
        'price',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function itemdetail(){
        return $this->hasOne(ProductDetail::class);
    }
}
