<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function index(){

        if (Auth::check()) {
            return to_Route('dashboard');
         }
        return view('login');
    }
    public function home($value='')
    {
        // code...
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);



        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return to_Route('dashboard');
             flashy()->success('Login Successfully ...', '#');

        }
        flashy()->error('Invalid Username or Password ', '#');
        return back()->with('loginError', 'Login Failed!');
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been log out!');
    }


    public function register()
    {
        return view('register');
    }
    public function registerUser(Request $request) {

        $validatedData = $request->validate([
            "name"=>"required",
            "email" => ['required', 'email:rfc,dns', 'unique:users,email'],
            "password" => ['required']
        ]);

        if($validatedData){
            $validatedData["password"] = Hash::make($validatedData["password"]);

            User::create([
                "name" =>  $validatedData["name"],
                "password" =>  $validatedData["password"],
                "email" =>  $validatedData["email"],
            ]);
            flashy()->success('Account has been Created Login Here', '#');
            return redirect('/')->with('success', 'Registered Successful!');

        }

        return back()->with('error', 'Registration failed!');

    }
     public function resetPassword($key){
        return view('reset-password',['key'=>$key]);
    }
    public function resetPasswordCh(Request $request){
        $validatedData = $request->validate([
            "password" => ['required','confirmed','min:3'],
        ]);

        if($validatedData){
           $User=User::find(base64_decode($request->key));
           if ($User) {
                  $User->update(['password'=>Hash::make($validatedData["password"])]);
                  flashy()->info('Password has been Updated!', '#');
            }else{

                flashy()->error('Invalid User Id', '#');

            }
        }
            return back()->with('error', 'Password has been not Updated!');
    }


}
