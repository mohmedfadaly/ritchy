<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Files;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
use View;
use Modules\Society\Entities\Chat;

class CustomersController extends Controller
{


    # index
    public function Index()
    {
        $data = Customer::latest()->get();
        return view('customers.customers',compact('data'));
    }


    # store
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:10|max:50|unique:customers,name',
            'phone'         => 'required|unique:customers,phone,',
            'password'      => 'required|min:6',

        ]);

        $data = new Customer;
        $data->name     = $request->name;
        $data->phone     = $request->phone;
        $data->password = bcrypt($request->password);

        $data->save();
        MakeReport('بإضافة عميل ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    # edit
    public function Edit($id)
    {
        $data = Customer::findOrFail($id);
    	return view('customers.edit_customer',compact('data'));
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'name'      => 'required',
            'phone'     => 'required|unique:customers,phone,'.$request->id,
        ]);

        $data = Customer::where('id',$request->id)->first();
        $data->name     = $request->name;
        $data->phone     = $request->phone;

        # password
        if(!is_null($request->password))
        {
            $data->password = bcrypt($request->password);
        }


        $data->save();
        MakeReport('بتحديث عميل ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # delete
    public function Delete($id)
    {
        $data = Customer::where('id',$id)->first();

    	MakeReport('بحذف عميل '.$data->name);
    	$data->delete();
    	Alert::success('عملية ناجحة','تم الحذف');
    	return back();
    }
}
