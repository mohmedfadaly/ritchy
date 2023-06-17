<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Files;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
use View;
use Modules\Society\Entities\Chat;

class providersController extends Controller
{


    # index
    public function Index()
    {
        $data = Provider::latest()->get();
        return view('Providers.Providers',compact('data'));
    }

    # store
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:10|max:50|unique:customers,name',
            'phone'         => 'required|unique:providers,phone,',
            'password'      => 'required|min:6',

        ]);

        $data = new Provider;
        $data->name     = $request->name;
        $data->phone     = $request->phone;
        $data->password = bcrypt($request->password);

        $data->save();
        MakeReport('بإضافة مندوب ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # edit
    public function Edit($id)
    {
        $data = Provider::findOrFail($id);
        return view('Providers.edit_Provider',compact('data'));
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'edit_name'      => 'required',
            'edit_phone'     => 'required|unique:providers,phone,'.$request->edit_id,

        ]);

        $data = Provider::findOrFail($request->edit_id);
        $data->name     = $request->edit_name;
        $data->phone    = $request->phone;

        # password
        if(!is_null($request->edit_password))
        {
            $data->password = bcrypt($request->edit_password);
        }


        $data->save();
        MakeReport('بتحديث مندوب ' .$data->name);
        Alert::success('success','تم الحفظ');
        return back();
    }

    # delete
    public function Delete($id)
    {
        $data = Provider::where('id',$id)->first();

        MakeReport('بحذف مندوب '.$data->name);
        $data->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
