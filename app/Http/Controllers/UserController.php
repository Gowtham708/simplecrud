<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create user
    public function index(){
        $users=User::all();
        return view('index',compact('users'));
    }
     //store user
    public function store(Request $request){
    $request->validate([
        'name'=> 'required',
        'email' => 'required|email',
        'state' => 'required',
        'country' => 'required'
    ]);
     User::create([
         'name' => $request->name,
         'email' => $request->email,
         'state' => $request->state,
         'country' => $request->country
     ]);
     return redirect()->route('user.index')->with('success','User has been registered');
    }
      //edit user
    public function edit($id){
         $user = User::find($id);
        return view('edit',compact('user'));
    }
        //update user
    public function update(Request $request,$id){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'state' => 'required',
            'country' => 'required'
        ]);
        $user = User::find($id);
        $user->update([
         'name' => $request->name,
         'email' => $request->email,
         'state' => $request->state,
         'country' => $request->country 
        ]);
        return redirect()->route('user.index')->with('success','User has been updated');
    }
      //delete user
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success','User has been deleted');
    }
}
