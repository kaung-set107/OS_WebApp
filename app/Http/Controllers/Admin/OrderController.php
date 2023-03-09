<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\appends;
use App\Models\User;

class OrderController extends Controller
{
    public function pending(){
        $order=ProductOrder::where('status','pending')
        ->with('user','product')
        ->orderBy('id','DESC')
        ->paginate(10);
        
        return view('admin.order.index',compact('order'));
    }

    public function complete(Request $request){

        if(isset($request->start_date)){
                $start_date=$request->start_date;
                $end_date=$request->end_date;
                $order=ProductOrder::where('status','complete')
                ->whereBetween('created_at',[$start_date,$end_date])
                
                ->paginate(2);
                $order->appends($request->all());
                //return $orders;
                
        }else{
                $order=ProductOrder::where('status','complete')->with('user','product')
                ->orderBy('id','DESC')
                ->paginate(4);
        }
        
        
        return view('admin.order.complete',compact('order'));
    }

    public function makecomplete($id){
        ProductOrder::where('id',$id)->update([
            'status'=>'complete'
        ]);

        return redirect()->back()->with('success','Change To Complete Order!');
    }

    
    
}