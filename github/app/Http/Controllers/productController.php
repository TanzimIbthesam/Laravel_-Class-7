<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Image;

class productController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function product(){
        $products=Product::all();
        $delete_products=Product::onlyTrashed()->get();
        // in case of pagination
        // $products=Product::paginate(5);
     
        // $delete_products=Product::onlyTrashed()->paginate(2);
       
        return view('product.index',compact('products','delete_products'));
      
    }
    public function productinsert(Request $request){
        // print_r($request->all());
        
    //   
    $request->validate([
         'product_name'=>'required|string',
         'product_price'=>'required|numeric',
         'product_quantity'=>'required|numeric',
         'alert_quantity'=>'required|numeric',
         
    ],
    [
        'product_name.required'=>'Please insert your product name',
    ])
    ;
   $product_id= Product::insertGetId([
     'product_name'=>$request->product_name,
     'product_price'=>$request->product_price,
     'product_quantity'=>$request->product_quantity,
     'alert_quantity'=>$request->alert_quantity,
     'created_at'=>$request->created_at,
     
     'created_at'=>Carbon::now(),
    ]);
    if($request->hasFile('product_photo')){
        $product_photo= $request->file('product_photo');
        // echo $product_photo->getClientOriginalExtension();
         $new_name=$product_id.".".$product_photo->getClientOriginalExtension();
         "<br>";
        $save_location='public/uploads/product_photos/'.$new_name;
        
          Image::make($product_photo)->resize(50,50)->save(base_path($save_location));
        Product::findorFail($product_id)->update(
          [
              'product_photo_location'=>$new_name,
          ]
        );
        }
    // echo $product_id;
    // echo "DONE";
    return back()->with('status','Data inserted successfully');
    //Flashed data

    }
    public function productdelete($product_id){
        $product_name= Product::findOrFail($product_id)->product_name;
        Product::findOrFail($product_id)->delete();
        return back()->with('deletestatus',' Data deleted successfully');
       
    }
    public function productrestore($product_id){
        
        $product_restore=Product::onlyTrashed()->where('id',$product_id)->restore();
        return back();
    }
    public function productforce($product_id){
       
        $product_restore=Product::onlyTrashed()->where('id',$product_id)->forceDelete();
        return back();
    }
    public function productedit($product_id){
        $products=Product::findorFail($product_id);
        return view('product.edit',compact('products'));
    }
   public function productupdate(Request $request){
       Product::findorFail($request->product_id)->update(
           [
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_quantity'=>$request->product_quantity,
            'alert_quantity'=>$request->alert_quantity,
           ]
           );
           return back();
        // print_r($request->all());
   }
    }
   

   

    
   
   

