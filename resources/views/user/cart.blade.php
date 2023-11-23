<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Required meta tags -->
    @include('admin.css')
</head>
<body>
    <body>
        @include('admin.sidebar')
      <!-- partial -->

    
        @include('admin.navbar')

        @if(session()->has('message'))
        {
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('message')}}    
            </div>
        }
        @endif


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
        @include('admin.script')
  </body>
</body>
</html>