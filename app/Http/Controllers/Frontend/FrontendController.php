<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Slider;
use Auth;
use Illuminate\Support\Facades\File;
class FrontendController extends Controller
{
   
    public function index(){
        $sliders = Slider::all();
        $products = Product::leftjoin('product_images','product_images.product_id','=','products.id')
        ->select('products.name','products.selling_price','product_images.image','products.id')->get();
        // print_r($products);
        // exit();

        return view('frontend.index',compact('products','sliders'));
    }

    public function cart(Request $request, $id)
    {    
      
        $user_id = Auth::user()->id; 
    
        $product = Product::findOrFail($id);

        $cart = Cart::where('product_id' , '=' , $id)->where('user_id' , '=' , $user_id)->get();
        if(count($cart)){
         // already found in cart;
        }else{
            
         $cart = new Cart();
         $cart->product_id = $id;
         $cart->price = $product->selling_price;
         $cart->user_id = $user_id;
         $cart->save();
        }
        
       $products = Product::leftjoin('carts','carts.product_id','=','products.id')
       ->leftjoin('product_images','product_images.product_id','=','products.id')
       ->select('products.name','products.selling_price','products.id','product_images.image','carts.product_id')
       ->where('carts.user_id' , '=' , $user_id)->get();
       
   
        return view('frontend.addcart',compact('products'));
    }
 
// checkout


public function checkout(){
    return view('frontend.checkout');
}

public function update(Request $request)
{
    if($request->id && $request->quantity){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
public function remove(Request $request)
{
    if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Product removed successfully');
    }
}
}