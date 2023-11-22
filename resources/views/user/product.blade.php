<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
            
            <form action={{url('search')}} method="GET" class="form-inline" style="float: right; padding: 10px;">
              <input class="form-control" type="search" name="search" placeholder="search">
              <input class="btn btn-success" type="submit" name="submit" value="search">
            </form>
          </div>
        </div>
        
        @foreach ($data as $product)
        {{-- <div class="m-3"> --}}
          <div class="col-md-4 border" >
            <div class="product-product">
              <a href="#"><img src="productimage/{{$product->image}}"  alt="" width="300" height="300"></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>{{$product->price}}</h6>
                <p>{{$product->description}}</p>
  
                <form action="{{url('addcart', $product->id)}}" method="post">
                  @csrf
                  <input class="form-control" type="number" value="1" min="1" name="quantity">
                  <br>
                  <input class="btn btn-primary" type="submit" value="Add cart">
                </form>
  
              </div>
            </div>
          </div>

        {{-- </div> --}}

        @endforeach

      </div>
      @if (method_exists($data, 'links'))
        <div>
          {!! $data->links() !!}
        </div>    
      @endif
          
    </div>
  </div>