<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    private User $user;
    protected function setUp(): void{
        parent::setUp();
        $this->user=$this->createUser();
    }
    public function createUser(): User{
        return User::factory()->create();
    }
    public function test_product_list(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Second Thumbnail label');
    }
    public function test_create_user(){
        $category=Category::create(['name'=>'ELECTRONIC']);
        $subcategory=Category::create(['name'=>'camera','category_id'=>'1']);
        $product=Product::create(['category_id'=>2,'name'=>'product1','price'=>200,'image'=>'NULL']);
        dd($product.id);
    }

    public function test_productlist(){
        $category=Category::create(['name'=>'ELECTRONIC']);
        $subcategory=Category::create(['name'=>'camera','category_id'=>'1']);
        $products=Product::factory(count:11)->create();
        $lastproduct=$products->last();
        
        $response=$this->get(uri:'/product/list');
        $response->assertStatus(200);
        $response->assertViewHas('products', function($collection) use($lastproduct){
            return !$collection->contains($lastproduct);
        });
    }
    public function test_create_product(){
        $user=$this->createUser();
        $response=$this->actingAs($user)->get(uri:'/admin/product/create');
        $response->assertStatus(200);
    }
    public function test_create_product_second(){
        $response=$this->actingAs($this->user)->get(uri:'/admin/product/create');
        $response->assertStatus(200);
    }
}
