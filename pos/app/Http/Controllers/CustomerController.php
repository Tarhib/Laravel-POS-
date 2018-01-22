<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class CustomerController extends Controller
{
  public function show(){
      $customers = Customer::paginate(6);
      return view('customer.index',compact('customers'));
    }
    public function addCustomer(Request $request){
      $rules = array(
        'name' => 'required'
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    else {
      $customer = new Customer;
      $customer->name = $request->name;
      $customer->phone = $request->phone;
      $customer->save();
      return response()->json($customer);
    }
}
}
