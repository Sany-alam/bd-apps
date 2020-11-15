<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Apk;

class ApkController extends Controller
{
    public function add_apk()
    {
        return view('add-apk',['accounts'=>Account::orderBy('id','desc')->get()]);
    }

    public function create_apk(Request $request)
    {
        $apk = $request->name.'.apk';
        $request->apk->move(public_path('../apk'), $apk);

        $logo = $request->name.'.'.$request->logo->extension();
        $request->logo->move(public_path('../logo'),$logo);

        $data = Apk::create($request->except(['logo','apk']));
        $data->update(['logo'=>$logo,'apk'=>$apk]);
        return redirect()->back()->with('message','Apk created successfully');
    }

    public function view_apk()
    {
        return view('view-apk',['apks'=>Apk::orderby('id','desc')->get()]);
    }

    public function delete_apk(Request $request)
    {
        $apk = Apk::where('id',$request->id)->first();
        if ($apk->logo!='') {
            unlink('logo/'.$apk->logo);
        }
        if ($apk->apk!='') {
            unlink('apk/'.$apk->apk);
        }
        $apk->delete();
        return redirect()->back()->with('message','Apk Deleted successfully');
    }

    public function edit_apk(Request $request)
    {
        return view('edit-apk',['apk'=>Apk::where('id',$request->id)->first(),'accounts'=>Account::orderBy('id','desc')->get()]);
    }

    public function update_apk(Request $request)
    {
        $apk = Apk::where('id',$request->id)->first();
        if ($apk->logo!=''&&$request->hasFile('logo')) {
            unlink('logo/'.$apk->logo);
            $file_logo = $request->name.'.'.$request->logo->extension();
            $request->logo->move(public_path('../logo'),$file_logo);
            $apk->logo = $file_logo;
        }
        if ($apk->apk!=''&&$request->hasFile('apk')) {
            unlink('apk/'.$apk->apk);
            $file_apk = $request->name.'.apk';
            $request->apk->move(public_path('../apk'), $file_apk);
            $apk->apk = $file_apk;
        }
        $apk->account_id = $request->account_id;
        $apk->android_id = $request->android_id;
        $apk->bdapps_id = $request->bdapps_id;
        $apk->name = $request->name;
        $apk->type = $request->type;
        $apk->details = $request->details;
        $apk->update();
        return redirect('view-apk')->with('message','Updated successfully');
    }
}
