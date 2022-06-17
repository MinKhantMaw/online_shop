<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
       $user=Auth::user()->role;
       if($user =='admin'){
           return view('admin.home');
       }else{
             $product=Product::paginate(3);
             $user=auth()->user();
             $count=Cart::where('phone',$user->phone)->count();
             return view('user.home',compact('product','count'));
       }
    }

    public function home(){
        if(Auth::id())
        {
            return redirect('admin');
        }
        else
        {
            $product=Product::paginate(3);
            return view('user.home',compact('product'));
        }

    }
    // add card
    public function addCard(Request $request,$id)
    {

        if(Auth::id()){
            $user=auth()->user();
            $product=Product::find($id);
            $cart=new Cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->name;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back()->with('success','Product added to cart successfully');
        }else{
            return redirect('login');
        }
        $product=Product::find($id);

        return view('user.add-card',compact('product'));
    }

    // show cart
    public function showCart(){
        $user=auth()->user();
        $cart=Cart::where('phone',$user->phone)->get();
        $count=Cart::where('phone',$user->phone)->count();
        return view('user.show-cart',compact('count','cart'));
    }
    // cart delete
    public function cartDelete($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Product deleted from cart successfully');
    }
    // order product
    public function order(Request $request){




        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;
        
        foreach ($request->productname as $key => $productname)
        {
           $order=new Order;
              $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];

            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='pending';
            $order->save();

        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('success','Order placed successfully');
    }
}
