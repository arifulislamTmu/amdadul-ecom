<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
 /*   public function __construct() {
        $this->middleware('auth:admin');
    } */

    public function user_list()
    {
      $users = User::latest()->get();
      return view('admin.user-list.index', compact('users'));
    }

    public function userInfo($id)
    {
      $userInfo = User::find($id);
      return response()->json($userInfo);
    }

    public function genarateOtp()
    {
      $otp = rand ( 1000 , 9999 );
      return response()->json($otp);
    }
    public function userEmailCheck($value)
    {
        $validator = Validator::make(['email' => $value], [
            'email' => 'required|email|unique:users,email',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
    
        return response()->json([
            'success' => true
        ]);
    }
    public function userPhoneCheck($value)
    {
      $exist = User::where('phone', $value)->exists();
  
      return response()->json([
        'success' => $exist
      ]);
    }

    public function update_profile(Request $request)
    {
      $user = User::findOrFail($request->userId);
      $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'division' => 'required|integer',
        'district' => 'required|integer',
        'thana' => 'required|integer',
        'address_holdding' => 'required|string|max:500',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    dd($user);

    $user->name = $validatedData['name'];
    $user->last_name = $validatedData['last_name'];
    $user->email = $validatedData['email'];
    $user->phone = $validatedData['phone'];
    $user->country = $validatedData['country'];
    $user->division = $validatedData['division'];
    $user->district = $validatedData['district'];
    $user->thana = $validatedData['thana'];
    $user->address_holdding = $validatedData['address_holdding'];

    if ($request->hasFile('image')) {
        /* // Delete the old image if it exists
        if ($user->image) {
            Storage::delete($user->image);
        }
        // Store the new image */
        $user->image = $request->file('image')->store('profile_images', 'public');
    }

    $user->save();

    return response()->json(['message' => 'Profile updated successfully']);
    }
}



