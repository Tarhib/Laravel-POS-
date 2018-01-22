<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ;
use App\Category ;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class ProductController extends Controller
{
    public function show(){
      $categories=Category::all()->sortByDesc('id');
      $products=Product::paginate(6);
        return view('product.index',compact('products','categories'));
    }



    public function addProduct(Request $request){
      $rules = array(
        'p_name' => 'required',
        'b_price' => 'required',
        'profit' => 'required'
      );
    $validator = Validator::make ( Input::all(), $rules);
     if ($validator->fails())
     return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    else {
      $product= new Product();
      $product->p_name=$request->p_name;
      $product->catname=$request->catname;
      $product->b_price=$request->b_price;
      $product->profit=$request->profit;
      $product->s_price=($request->b_price)+($request->profit)*($request->b_price)*0.01;



      $product->save();
      return response()->json($product);
    }
}

public function editProduct(request $request){
   $product = Product::find ($request->id);
   $product->p_name=$request->p_name;
   $product->catname=$request->catname;
   $product->b_price=$request->b_price;
   $product->profit=$request->profit;
   $product->s_price=($request->b_price)+($request->profit)*($request->b_price)*0.01;

   $product->save();
   return response()->json($product);
}

}
