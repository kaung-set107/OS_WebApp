<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{


public function index(){
        $products=Product::latest()->with('category')->simplePaginate(6);
        
        return view('user.index',compact('products'));
    }

public function byCategory($slug){
        $cat_id=Category::where('slug',$slug)->first()->id;
        $products=Product::where('category_id',$cat_id)->with('category')->paginate(6);

                return view('user.index',compact('products'));
    }

public function search(Request $request){
        $search=$request->search;
        $products=Product::where('name','like',"%{$search}%")->with('category')->paginate(6);
        $products->appends($request->all());
//"%{$search}%" you can write double code only if not can error 
        return view('user.index',compact('products'));
    }

public function productdetail(Request $request, $slug){
        //update
        $product=Product::where('slug',$slug);
        $product->update([
            'view_count'=>DB::raw("view_count+1")
        ]);
        //get
        $product=$product->with('category')->first();

        //redirect
        return view('user.productdetail',compact('product'));
    }

public function showcart(){
        $cart=ProductCart::with('product')->where('user_id',Auth::user()->id)->get();
        return view('user.cart',compact('cart'));
    }

public function makeorder(){
        $user_id=Auth::user()->id;
        $cart=ProductCart::where('user_id',$user_id)->get();
        foreach($cart as $c){
            ProductOrder::create([
                'user_id'=>$user_id,
                'product_id'=>$c->product_id,
                'qty'=>$c->qty,
                'status'=>'pending'
            ]);
            ProductCart::where('id',$c->id)->delete();

        }
        
        return redirect()->back()->with('success','Your Order Made!');
    }

public function addtocart($slug){
        $user_id=Auth::user()->id;
        $product_id=Product::where('slug',$slug)->first()->id;
        $qty=1;

        ProductCart::create([
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'qty'=>$qty
        ]);

        return redirect()->back();
    }
    
public function pendingorder(){
        $orders=ProductOrder::where('user_id',Auth::user()->id)
        ->with('product')
        ->where('status','pending')
        ->paginate(6);

        $status='pending';

        return view('user.order',compact('orders','status'));
    }

public function completeorder(){
        $orders=ProductOrder::where('user_id',Auth::user()->id)
        ->with('product')
        ->where('status','complete')
        ->orderBy('id','DESC')
        ->paginate(5);

        $status='complete';

        return view('user.order',compact('orders','status'));
    }

public function showprofile(){
        $user=Auth::user();
        return view('user.info',compact('user'));
    }

public function postprofile(Request $request){
        $user=User::where('id',Auth::user()->id);

        //check image have?
        if($request->file('image')){
            //image store
            $file=$request->file('image');
            $name=uniqid(time()).$file->getClientOriginalName();
            $file_path='images/'.$name;

            $file->storeAs('images',$name);
        }else{
            $file_path=$user->first()->image;
        }

        //update
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$file_path
        ]);

        return redirect()->back()->with('success','Update Success!');
    }
    
public function changepassword(){
        return view('user.editpass');
    }

public function postchangepassword(Request $request){
        $request->validate([
            'password'=>'required'
        ]);

        $user=User::where('id',Auth::user()->id);

        $user->update([
            'password'=>Hash::make($request->password),
        ]);

        return redirect(url('/'))->with('success','Your password is changed!');
    }

public function deleteproduct($id){
        ProductCart::where('id',$id)->delete();

        return redirect()->back()->with('delete','Deleted your Cart Product!');
    }
    
}