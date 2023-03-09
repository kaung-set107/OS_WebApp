<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('category')->orderBy('id','DESC')->paginate('5');
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_id=Category::all();
        return view('admin.product.create',compact('cat_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
            'price'=>'required',
            'description'=>'required',

        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='images/'.$file_name;

        $file->storeAs('images',$file_name);


        Product::create([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=>$request->name,
            'category_id'=>$request->cat_id,
            
            'image'=>$file_path,
            'price'=>$request->price,
            'description'=>$request->description,
            'view_count'=>0

        ]);
        
        return redirect(route('admin.product.index'))->with('success','Product Created Success!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('id',$id)->with('category')->first();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::all();
        $pro=Product::where('id',$id)->with('category')->first();
        return view('admin.product.edit',compact('cat','pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get product id
            $product=Product::find($id);

        //if have image or not
        if($request->image){
            //change string => image/1234.jpg
            $img_arr=explode('/',$product->image);

            //delete image/
            Storage::disk('images')->delete($img_arr[0]);

        //image upload
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $path='images/'.$file_name;

        $file->storeAs('images',$file_name);

        }else{
            $path=$product->image;
        }

        //update
        Product::where('id',$id)->update([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=>$request->name,
            'category_id'=>$request->cat_id,
            
            'image'=>$path,
            'price'=>$request->price,
            'description'=>$request->description,
            

        ]);

        return redirect()->back()->with('success','Product Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product=Product::where('id', $id);

        $img_arr=explode('/',$product->first()->image);
        //for delete images/image\
        Storage::disk('images')->delete($img_arr[1]);

        $product->delete();

        return redirect(route('admin.product.index'))->with('delete', 'Deleted Success!');
    }
}