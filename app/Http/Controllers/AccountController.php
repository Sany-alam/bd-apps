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
}
