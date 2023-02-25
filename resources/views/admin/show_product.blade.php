<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .input_color {
            background-color: aqua;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }

        .image_size {
            width: 150px;
            height: 150px;
        }

        .td_design {
            padding: 30px;
        }

        .title_color{
            color: red;
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

                <h2 class="h2_font">All Product</h2>
                <table class="center">
                    <tr class="input_color">
                        <td class="td_design">Product title</td>
                        <td class="td_design">Description</td>
                        <td class="td_design">Quantity</td>
                        <td class="td_design">Catagory</td>
                        <td class="td_design">Price</td>
                        <td class="td_design">Discount_price</td>
                        <td class="td_design">Product image</td>
                        <td class="td_design">Delete</td>
                        <td class="td_design">Edit</td>
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <td class="title_color">{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="image_size" src="/product/{{$product->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this')" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                        </td>

                    </tr>

                    @endforeach
                </table>

            </div>
        </div>
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for tdis page -->
</body>

</html>