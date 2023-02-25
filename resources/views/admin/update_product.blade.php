<!DOCTYPE html>
<html lang="en">

<head>

<base href="/public">
    @include('admin.css')

    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;

        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

                @endif
                <div class="div_center">
                    <h2 class="h2_font">Update Products</h2>
                    <div class="div_design"></div>
                    <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title</label>
                            <input class="input_color" type="text" name="title" placeholder="Write a title" required="" value="{{$product->title}}">

                        </div>
                        <div class="div_design">
                            <label>Product description</label>
                            <input class="input_color" type="text" name="description" placeholder="Write a description" required="" value="{{$product->description}}">

                        </div>
                        <div class="div_design">
                            <label>Product price</label>
                            <input class="input_color" type="number" name="price" placeholder="Write a price" required="" value="{{$product->price}}">

                        </div>
                        <div class="div_design">
                            <label>Product discount price</label>
                            <input class="input_color" type="text" name="dis_price" placeholder="Write a discount price" value="{{$product->discount_price}}">

                        </div>
                        <div class="div_design">
                            <label>Product quantity</label>
                            <input class="input_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="" value="{{$product->quantity}}">

                        </div>
                        <div class="div_design">
                            <label>Product catagory</label>
                            <select class="input_color" name="catagory" required="">
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                                @foreach($catagory as $catagory)

                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                                @endforeach
                                
                            </select>

                        </div>

                        <div class="div_design">
                            <label>Current Product image</label>
                            <img style="margin:auto;" height="100px" width="100px" src="/product/{{$product->image}}">

                        </div>

                        <div class="div_design">
                            <label>Change Product image</label>
                            <input type="file" name="image" placeholder="Write a image" >

                        </div>
                        <div class="div_design">

                            <input type="submit" value="Update Product" class="btn btn-primary">

                        </div>

                    </form>




                </div>

            </div>
        </div>
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>