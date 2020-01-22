<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Auth;

class LoginController extends Controller{

  use AuthenticatesUsers;

  protected $redirectTo = RouteServiceProvider::HOME;

  public function __construct(){
    $this->middleware('guest')->except('logout');
  }

  public function enter(Request $request){

    $user = null;
    
    $validator = Validator::make($request->all(), [
      'username' => ['required', 'string', 'max:255'],
      'password' => ['required', 'string', 'min:8'],
      ]);
      
      if($validator->fails()){
        return response()->json($validator->errors(), 400);
      }
      
      $_request = $request->all();
      $username = $_request['username'];
      $password = $_request['password'];
      
      $credentials = ['username' => $username, 'password' => $password];
      Auth::attempt($credentials);
      
    if ( Auth::check() ) $user = Auth::user();
    try {
      if (! $token = JWTAuth::attempt($credentials)) {
        return response()->json('Invalid Credentials', 400);
      }
    } catch (JWTException $e) {
      return response()->json('Database Error', 500);
    }

    if($request->ajax()){
      return response()->json(['user'=>$user,'token'=>$token],200);
    }else{
      return redirect('home');
    }

  }

}
