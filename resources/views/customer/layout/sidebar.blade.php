
<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="product_summary.html"><img src="{{asset('front_theme/themes/images/ico-cart.png')}}" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
      @foreach ($sideCategories as $category)
        <li class="subMenu"><a>{{$category->name}} </a>
          <ul style="display:none">
            @foreach ($sideSubCategories as $subcategory)
              @if ($subcategory->category_id==$category->id)
                <li><a href="products.html"><i class="icon-chevron-right"></i>{{$subcategory->name}} </a></li>
              @endif
            @endforeach 											
          </ul>
        </li>
      @endforeach
  </ul>
    <br/>
      <div class="thumbnail">
        <img src="{{asset('front_theme/themes/images/products/panasonic.jpg')}}" alt="Bootshop panasonoc New camera"/>
        <div class="caption">
          <h5>Panasonic</h5>
            <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
        </div>
      </div><br/>
        <div class="thumbnail">
            <img src="{{asset('front_theme/themes/images/products/kindle.png')}}" title="Bootshop New Kindel" alt="Bootshop Kindel">
            <div class="caption">
              <h5>Kindle</h5>
                <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
            </div>
          </div><br/>
        <div class="thumbnail">
            <img src="{{asset('front_theme/themes/images/payment_methods.png')}}" title="Bootshop Payment Methods" alt="Payments Methods">
            <div class="caption">
              <h5>Payment Methods</h5>
            </div>
          </div>
</div>