<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User; 

use App\Models\Product;

use App\Models\Cart;

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

    public function add_cart(Request $request, $id) {
        if(Auth::id()) {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function product_search(Request $request){
        $search_text=$request->search;

        $product=product::where('title', 'LIKE', '%search_text%')->get();

        return view('home.userpage', compact('product'));
    }
}
