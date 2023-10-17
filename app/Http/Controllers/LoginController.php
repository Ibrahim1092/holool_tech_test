<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('Message','Fields must be filled out');
        }
        $user = User::where('email',$request->email)->first();
        if (! is_null($user))
        {
            if (Hash::check($request->password, $user->password))
            {
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                return redirect()->route('/home');
            }
            else return redirect()->back()->with('Message','Invaild Password');;
        }
        else return redirect()->back()->with('Message','Sorry! You are Not Registered Yet');
    }
}
