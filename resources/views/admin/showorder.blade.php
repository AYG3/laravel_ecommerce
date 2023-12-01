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
                  <td style="padding:10px; font-size:20px;">Name</td>
                  <td style="padding:10px; font-size:20px;">Phone</td>
                  <td style="padding:10px; font-size:20px;">address</td>
                  <td style="padding:10px; font-size:20px;">Product name</td>
                  <td style="padding:10px; font-size:20px;">Quantity</td>
                  <td style="padding:10px; font-size:20px;">Price</td>
                  <td style="padding:10px; font-size:20px;">Status</td>
                  <td style="padding:10px; font-size:20px;">Action</td>
                </tr>
        
                <form action="{{url('order')}}" method="POST">
                  @csrf
        
                  @foreach($data as $order)
                  <tr style="background-color: black; color:white;">        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->name}}</td>        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->phone}}</td>        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->address}}</td>        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->product_name}}</td>        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->Quantity}}</td>        
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->Price}}</td>
                    <td style="padding:10px; font-size:20px; color:white;">{{$order->status}}</td>
                    <td> <a class="btn btn-success" href="{{url('updatestatus', $order->id)}}">Delivered</a></td>
                  </tr>
                  @endforeach
                
                </form> 
            </table>
              

        </div>

    </div>

        
        @include('admin.script')
  </body>
</html>