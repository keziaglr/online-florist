<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cookie;

class UserController extends Controller
{
    //

    public function showRegisterForm()
    {
        return view('register-page');
    }

    public function showLoginForm()
    {
        return view('login-page');
    }

    public function showProfileForm()
    {
        $user = User::find(session('userId'));
        return view('profile-page')->with('user', $user);
    }

    public function showUpdateForm(Request $request)
    {
        $user = User::find($request->route('id'));
        return view('update-user')->with('user', $user);
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:App\User',
            'name' => 'required|string',
            'password' => 'required|alpha_dash|min:5',
            'cfpassword' => 'required|same:password',
            'phone' => 'required|integer|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'address' => 'required|min:10',
             'image' => 'mimes:jpeg,png,jpg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $filename);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'role' => 'user',
            'image' => $filename
        ]);

        return redirect()->back()->with('message', 'Registration Successful!');

    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if(auth()->attempt(['email'=>$email, 'password' => $password])){
            if($request->has('rememberme')){
                Cookie::make('email', $request->get('email'), 60);
                Cookie::make('password', $request->get('password'), 60);
            }

            return redirect('home');

        }else{
            return redirect()->back()->with('message', 'You have entered an invalid email or password');
        }

    }

    public function logout(Request $request){
        Cookie::forget('email');
        Cookie::forget('password');
        $request->session()->flush();
        return redirect('user/login');
    }

    public function profile(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:App\User',
            'name' => 'required|string',
            'phone' => 'required|integer|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'address' => 'required|min:10',
            'image' => 'mimes:jpeg,png,jpg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $filename);

        $image_path = "/image/".auth()->user()->image;
        if(auth()->user()->image != null){
            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
        }

        User::where(auth()->user()->id)->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $filename
        ]);

        return redirect()->back();
    }

    public function index(){
        $users = User::all();
        return view('user-page')->with('users', $users);
    }

    public function update(Request $request){
        $this->validate($request,[
            'email' => 'required|email|unique:App\User',
            'name' => 'required|string',
            'phone' => 'required|integer|digits_between:8,12',
            'gender' => 'required|in:male,female',
            'address' => 'required|min:10',
             'image' => 'mimes:jpeg,png,jpg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $filename);

        $image_path = "/image/".auth()->user()->image;
        if(auth()->user()->image != null){
            if(Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
        }

        User::where('id', $request->route('id'))->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $filename
        ]);

        return redirect()->back();
    }

    public function delete(Request $request){
        User::where('id', $request->route('id'))->delete();
        return redirect('user');
    }

}
