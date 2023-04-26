<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    
    public function registerPost()
    {
         User::create([
            "id"=>1,
            "firstName" => "fleury",
            "lastName" => "mugisha",
            "email" => "flymugisha@gmail.com",
            "password" => Hash::make('1234567890'),
        ]);
        return "okkk";
    }
    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,

        ])) {
            return redirect()->route('admin.home');
        }
        return back()->with('error', "email or password incorrect try again!");
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'You are logout successfully');
    }
    public function welcome(){
        $projectNbre=Project::count();
        $project=Project::paginate(2);
        $userNbre=User::count();
        $contactNbre=Contact::count();
        return view('admin.welcome',compact('projectNbre','userNbre','contactNbre','project'));
    }


}
