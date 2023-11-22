<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .title{
            color: white; 
            padding-top: 25px;
            font-size: 35px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }

        .item{
            padding:25px;
            color: black;   
        }

    </style>
  </head>
  <body>
        @include('admin.sidebar')
      <!-- partial -->

    
        @include('admin.navbar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align='center'>

                
                <h1 class="title">Update a Product</h1>

                {{-- Check if it closes when you are online --}}
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session()->get('message')}}
                </div>
 
                @endif

            <form action={{url('updateproduct', $data->id)}} method='post' enctype="multipart/form-data">
                @csrf
                
                
                    
                <div class="item">
                    <label>Product title: </label>
                    <input type="text" name="title" value={{$data->title}} required>
                </div>

                <div class="item">
                    <label>Price:  </label>
                    <input type="number" name="price" value={{$data->price}} required=' '>
                </div>

                <div class="item">
                    <label>Description: </label>
                    <input type="text" name="description" value={{$data->description}} required>
                </div>

                <div class="item">
                    <label>Quantity: </label>
                    <input type="number" name="quantity" value={{$data->quantity}} required>
                </div>


                <div class="item">
                    <label>Old Image: </label>
                    <img src='/productimage/{{$data->image}}' height="100" alt="Old Image">
                </div>

                <div class="item">
                    <input type="file" value={{$data->image}} name="file">
                </div>

                <div class="item">
                    <input class="btn btn-success" type="submit" name="submit">
                </div>

            </form>


            </div>
            

        </div>


          <!-- partial -->
        @include('admin.script')
  </body>
</html>