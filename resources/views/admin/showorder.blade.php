<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <body>
        @include('admin.sidebar')
      <!-- partial -->

    
    <div class='container-fluid page-body-wrapper'>

        <div class="container" align='center'>

            <table>
                <tr style="background-color:gray  ">
                  <td style="padding:10px; font-size:20px;">Product name</td>
                  <td style="padding:10px; font-size:20px;">Quantity</td>
                  <td style="padding:10px; font-size:20px;">Price</td>
                  <td style="padding:10px; font-size:20px; color: red;">Delete</td>
                </tr>
        
                <form action="{{url('order')}}" method="POST">
                  @csrf
        
                  @foreach($data as $order)
                  <tr style="background-color: black; color:white;">
        
                    <td style="padding:10px; font-size:20px; color:white;">
                    
                        <input type="text", name="productname[]" value="{{$order->product_title}}" hidden>
                      {{$order->product_title}}
                    
                    </td>
        
                    <td style="padding:10px; font-size:20px; color:white;">
                    
                        <input type="text" name="quantity[]" value="{{$order->quantity}}" hidden>
        
                      {{$order->quantity}}
        
                    </td>
        
        
                    <td style="padding:10px; font-size:20px; color:white;">
                      
                      <input type="text" name="price[]" value="{{$order->price}}" hidden>
                      
                      {{$order->price}}
                    </td>
        
                    <td ><a href={{url('deletecart', $order->id)}} class="btn btn-danger">Delete</a></td>
                  </tr>
        
                  
                  @endforeach
                
                
                  
                </table>
              
              <button class="btn btn-success"> <a href="">Confirm Order</a></button>
              </form>  

        </div>

    </div>

        
        @include('admin.script')
  </body>
</html>