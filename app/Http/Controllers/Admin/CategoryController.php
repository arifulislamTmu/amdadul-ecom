<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SliderModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  public function index()
  {
    $categories = Category::latest()->get();
    return view('admin.category.index',compact('categories'));
  }


  // Category insert 
  public function catehoryAdd(Request $request) {

    $request->validate([

      'category_name'=>'required|unique:categories,category_name'
    ]
  
  );

    Category::insert([
      'category_name'=>$request->category_name,
      'created_at'=>Carbon::now()
    ]);

    return redirect()->back()->with('success','Category Added Success ');
  }

  // Category Edit 
  public function editCategory($id)
  {
    $categories = Category::latest()->get();
    $category_S = Category::find($id);
    return view('admin.category.edit', compact('category_S','categories'));
  }

// Category Update
public function UpdateCategory(Request $request)
{
  $request->validate([
    'category_name'=>'required|unique:categories,category_name'
  ]);

  Category::findOrfail($request->cat_id)->update([
    'category_name'=>$request->category_name,
    'updated_at'=>Carbon::now()
  ]);
  return redirect()->route('addcatehory')->with('success','Category Upadate Success ');
}

public function DeleteCategory($id)
{
  Category::find($id)->delete();
  Product::where('category_name',$id)->delete();
  SliderModel::where('category_name',$id)->delete();
  return redirect()->back()->with('success_delete','Category Deleted Success ');
}

public function statasdeactive($id)
{

  Category::findOrfail($id)->update([
    'status'=>'0',
    'updated_at'=>Carbon::now()
  ]);

  return redirect()->route('addcatehory')->with('success_delete','Category Deactived Success ');
}

public function statasactive($id)
{
  Category::findOrfail($id)->update([
    'status'=>'1',
    'updated_at'=>Carbon::now()
  ]);
  return redirect()->route('addcatehory')->with('success','Category Actived Success ');
}
}
