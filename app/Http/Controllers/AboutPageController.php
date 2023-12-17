<?php

namespace App\Http\Controllers;

use App\AboutPage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\facades\Image;

class AboutPageController extends Controller
{
public function __construct() {
$this->middleware('auth:admin');
}
public function index()
{
    $abuts_us = AboutPage::latest()->get();
  return view('admin.about_us.index',compact('abuts_us'));
}

public function about_add(Request $request)
{
   $request->validate([
    'about_heading'=>'required',
    'about_image'=>'required',
    'about_description'=>'required',
   ]);
   $image_one = $request->file('about_image');
   $name_gena = hexdec(uniqid()).".".$image_one->getClientOriginalExtension();
   \Image::make($image_one)->resize(1024,900)->save('frotend/img/product/upload/'.$name_gena);
   $image_url = 'frotend/img/product/upload/'.$name_gena;

   AboutPage::insert([
    'about_heding'=>$request->about_heading,
    'about_image'=>$image_url,
    'about_us'=>$request->about_description,
    'created_at' => Carbon::now()
   ]);

   return redirect()->back()->with('success','Successfully Added');
}


public function abouts_Delete($id)
{
    AboutPage::find($id)->delete();
    return redirect()->back()->with('success_delete','Deleted Success ');
}

}