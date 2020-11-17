<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function add_account(Request $request)
    {
        Account::create($request->all());
        return redirect()->back()->with('message','Account created succesfully');
    }

    public function view_account()
    {
    	return view('view-account',['accounts'=>Account::orderBy('id','desc')->get()]);
    }

    public function edit_account(Request $request)
    {
    	return view('edit-account',['account'=>Account::where('id',$request->id)->first()]);
    }

    public function update_account(Request $request)
    {
    	Account::where('id',$request->id)->update(['username'=>$request->username,'password'=>$request->password]);
    	return redirect('view-account')->with('message','Account updated successfully');
    }

    public function delete_account(Request $request)
    {
    	Account::where('id',$request->id)->delete();
    	return redirect()->back();
    }
}
