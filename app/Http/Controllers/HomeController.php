<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User; 

use App\Models\Product;

class HomeController extends Controller
{

    public function index(){
        $product=Product::all();
        return view('home.userpage', compact('product'));
    }
    public function redirect(){
        $useremail=Auth::user()->email; 
        if($useremail=='admin@gmail.com'){ //dùng usetype bị lỗi, chưa biết fix
            return view('admin.home'); 
        }
        else {
            $product=Product::paginate(10);
            return view('home.userpage', compact('product')); 

        }
    }

    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details', compact('product'));
    }
}
