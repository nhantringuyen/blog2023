<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users =  User::all();
        return View('admin.user.list',compact('users'));

    }
    public function create()
    {
        return View('admin.user.create');
    }
    public function store(Request $request){
        $this->validate($request,User::rules(),User::message());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash::make($request->password)
            'is_admin' => $request->is_admin
        ]);
        return redirect()->route('admin.user.index')->with('success','Created successful');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request,$id){
        $this->validate($request,User::rules(),User::message());
        $user = User::find($id);
        $data = [
            'name' => $request->name,
            'is_admin'  => $request->is_admin
        ];
        if($request->password){
            $this->validate($request,[
                'password'  => 'required|min:6|max:32',
                'txtRePass' => 'same:password',
            ]);
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('admin.user.edit',$user->id)->with('success','Update successfully');
    }
}
