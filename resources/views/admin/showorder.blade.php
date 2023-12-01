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

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th scope="col">Update</th>
                        <th scope='col'>Delete</th>
                    </tr>
                </thead>
                @foreach($data as $product)
                <tbody>
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td> {{$product->description}} </td>
                        <td> {{$product->quantity}} </td>
                        <td>
                            <img src="productimage/{{$product->image}}" >
                        </td>
                        <td  ><a href={{url('updateview', $product->id)}} class="btn btn-primary">Update</a></td>
                        <td ><a href={{url('deleteproduct', $product->id)}} class="btn btn-danger">Delete</a></td>
                    </tr>
                </tbody>
                @endforeach
                
            </table>

        </div>

    </div>

        <!-- partial -->
        @include('admin.body')
          <!-- partial -->
        @include('admin.script')
  </body>
</html>