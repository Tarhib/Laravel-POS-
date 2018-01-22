<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
class CategoryController extends Controller
{
  public function show(){
      $category = Category::paginate(6);
      return view('category.index',compact('category'));
    }

    public function addItem(Request $request){
      $rules = array(
        'name' => 'required'
      );
    $validator = Validator::make ( Input::all(), $rules);
    if ($validator->fails())
    return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

    else {
      $category = new Category;
      $category->name = $request->name;

      $category->save();
      return response()->json($category);
    }
}

public function editItem(request $request){
  $category = Category::find ($request->id);
  $category->name = $request->name;

  $category->save();
  return response()->json($category);
}


}
