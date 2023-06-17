<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Session;
use Auth;
use App\Inbox;
use Carbon\Carbon;
use App;
use View;
use DB;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;
use App\Models\Files;
use Image;
use File;
use Illuminate\Support\Str;
use Mail;



class AuthController extends Controller
{
    public function __construct()
    {
        View::share([
           
        ]);
    }
    
    # login
    public function login(Request $request)
    {
        return view('front.auth.login_customer');
    }

    # check auth
    public function logincustomer(Request $request)
    {
        $Customer = Customer::where('name',$request->name)->first();
        if($Customer)
        {
            if (Auth::guard('customer')->attempt(['name' => $request->name, 'password' => $request->password])) {
            Alert::success('عملية ناجحة','شكرا لإنضمامك لنا');
            return redirect()->intended(route('welcome'));

           }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return back();
            }
            

        }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return back();
        }
    }

    # store
    public function complate(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:10|max:50|unique:customers,name,'.Auth::guard('customer')->user()->id,
            'file'      => 'required|mimes:pdf',
        
        ]);

        $data = Customer::where('id',Auth::guard('customer')->user()->id)->first();
        $data->name        = $request->name;
        $data->degree      = $request->degree;
        $data->phone       = $request->phone;
        $data->email       = $request->email;
        $data->spaci       = $request->spaci;
        $data->area        = $request->area;
        $data->city        = $request->city;
        $data->job_name    = $request->job_name;
        $data->place_work  = $request->place_work;
        $data->active      = '1';
        $data->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
 
            $namev =date('d-m-y').time().rand().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath, $namev);

            $fil = new Files;
            $fil->file  = $namev;
            $fil->user_id     = $data->id;
            $fil->save();
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }
    
    # info
    public function info(Request $request)
    {
        return view('front.auth.info_customer');
    }

    # store
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:10|max:50|unique:customers,name,'.Auth::guard('customer')->user()->id,
            'file'      => 'nullable|mimes:pdf',
        
        ]);

        $data = Customer::where('id',Auth::guard('customer')->user()->id)->first();
        $data->name        = $request->name;
        $data->degree      = $request->degree;
        $data->phone       = $request->phone;
        $data->email       = $request->email;
        $data->spaci       = $request->spaci;
        $data->area        = $request->area;
        $data->city        = $request->city;
        $data->job_name    = $request->job_name;
        $data->place_work  = $request->place_work;
        # upload avatar
        if(!is_null($request->avatar))
        {
        	# delete avatar
	    	if($data->avatar !== 'default.png')
	    	{
	   			File::delete('uploads/customers/avatar/'.$user->avatar);
	    	}

	    	# upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/customers/avatar/'.$name);
            $data->avatar=$name;
        }
        $data->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $namev =date('d-m-y').time().rand().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'uploads/files';
            $file->move($destinationPath, $namev);

            $fil = new Files;
            $fil->file  = $namev;
            $fil->user_id     = $data->id;
            $fil->save();
        }
        Alert::success('عملية ناجحة','تم الحفظ');
        return back();
    }

    public function Logout()
    {
        if(Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();
            return redirect(url('/'));
        }else{
            return redirect(url('/'));
        }
    }


}
