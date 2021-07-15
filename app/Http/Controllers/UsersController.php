<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;


class UsersController extends Controller
{   
    
    
    

    public function index(Request $request)
    {  
         
        return view('admin.customers.index')->with('users',User::all());
    }

    public function search(Request $request){

        $search = $request->input('search');
    
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();
    
        return view('admin.customers.index')->with('users',$users);
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.customers.update')->with('user',$user);
    }

    public function update(Request $request, $id)
    {  
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return  redirect()->route('users');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function deactivate($id)
    {
        $user=User::find($id);
        $user->status=0;
        $user->save();
        return redirect()->back();

    }

    public function activate($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->save();
        return redirect()->back();

    }

    public function authenticated(Request $request, $user)
    {
        if($user->status==0) {
            Auth::logout();
            return redirect('/login');
        }
    }
}
