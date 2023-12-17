<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\SliderModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
public function __construct() {
    $this->middleware('auth:admin');
}
public function index(){
  $brands = Brand::latest()->get();
  return view('admin.brand.index',compact('brands'));
}

  // Breand insert 
  public function brandAdd(Request $request) {

    $request->validate([

      'brand_name'=>'required|unique:brands,brand_name'
    ]);

    Brand::insert([
      'brand_name'=>$request->brand_name,
      'created_at'=>Carbon::now()
    ]);

    return redirect()->back()->with('success','Brand Added Success ');
  }

  // Brand Edit 
  public function editbrand($id)
  {
    $brands = Brand::latest()->get();
    $brand_S = Brand::find($id);
    return view('admin.brand.edit', compact('brand_S','brands'));
  }

// brnad Update
public function Updatebrand(Request $request)
{
  $request->validate([
    'brand_name'=>'required|unique:brands,brand_name'
  ]);

  Brand::findOrfail($request->cat_id)->update([
    'brand_name'=>$request->brand_name,
    'updated_at'=>Carbon::now()
  ]);
  return redirect()->route('addbrand')->with('success','Brand Upadate Success ');
}

public function Deletebrand($id)
{
  Brand::find($id)->delete();
  Product::where('brand_name',$id)->delete();
  SliderModel::where('brand_name',$id)->delete();
  return redirect()->back()->with('success_delete','Brand Deleted Success ');
}

public function statasdeactive($id)
{
  Brand::findOrfail($id)->update([
    'status'=>'0',
    'updated_at'=>Carbon::now()
  ]);
  return redirect()->route('addbrand')->with('success_delete','Brand Deactived Success ');
}

public function statasactive($id)
{
  Brand::findOrfail($id)->update([
    'status'=>'1',
    'updated_at'=>Carbon::now()
  ]);
  return redirect()->route('addbrand')->with('success','Brand Actived Success ');
}

}
