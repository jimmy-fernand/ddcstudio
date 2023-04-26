<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        // dd($user);
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "firstName" => "required",
                "lastName" => "required",
                "email" => "required|unique:users,email",
                "password" => "required"
            ]
        );
        User::create([
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return back()->with('success', 'user is save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate(
            [
                "firstName" => "required",
                "lastName" => "required",
                "email" => ['required', Rule::unique('users')->ignore($user->id)],
                "password" => "required"
            ]
        );
        $user->update(
            [
                "firstName" => $request->firstName,
                "lastName" => $request->lastName,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]
        );
        return back()->with('success', 'user is update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'user is deleted successfully');
    }

    public function allMessage()
    {
        $message=Contact::all();
        // dd($message);
        return view('admin.message.index',compact('message'));
    }

    public function profilAdmin()
    {
        return view('admin.users.profil');
    }
    public function updateProfilAdmin(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate(
            [
                "firstName" => "required",
                "lastName" => "required",
                "email" => ['required', Rule::unique('users')->ignore($user->id)],
            ]
        );
        $user->update(
            [
                "firstName" => $request->firstName,
                "lastName" => $request->lastName,
                "email" => $request->email,
            ]
        );
        return back()->with('success', 'user is update successfully');
    }
    public function changePassword()
    {
        return view('admin.users.changepassword');
    }
    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate(
            [
            'password' => 'required',
            'confirm_password' => ['same:password'],
            ]
        );
        $user->update(
            [
                'password' => Hash::make($request->password),
            ]
        );
        return back()->with('success', 'your password is update successfully');

    }
}
