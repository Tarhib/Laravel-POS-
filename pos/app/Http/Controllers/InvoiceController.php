<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Invoice;
use App\Product;
use App\Customer;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class InvoiceController extends Controller
{
  public function show(){
    $customers=Customer::all()->sortByDesc('id');;
    $products=Product::paginate(6);
    return view('invoice.index',compact('customers','products'));
  }


  public function addInvoice(Request $request){
    $rules = array(
      'invoice_no' => 'required',
      'customer_name' => 'required',
      'product_name' => 'required',
      'quantity'=>'required',
      'discount'=>'required'
    );
  $validator = Validator::make ( Input::all(), $rules);
   if ($validator->fails())
   return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

  else {
    $invoice= new Invoice();
    $invoice->invoice_no=$request->invoice_no;
    $invoice->customer_name=$request->customer_name;
    $invoice->product_name=$request->product_name;
    $invoice->quantity=$request->quantity;
    $invoice->discount=$request->discount;

    $product =Product::where('p_name',$request->product_name)->first();
    $invoice->unit_price=$product->s_price;
    $invoice->total_price=($request->quantity)*($invoice->unit_price);
    $invoice->grnd_price=($invoice->total_price)-(($invoice->discount)*($invoice->total_price)*0.01);


    $invoice->save();
    return response()->json($invoice);
  }

  }

}
