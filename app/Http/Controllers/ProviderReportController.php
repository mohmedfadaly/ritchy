<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProduct;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Provider;
use App\Models\ProviderReport;
use App\Models\ProviderReportProduct;
use App\Models\Section;
use View;
use Illuminate\Http\Request;
use Intervention\Image\File;
use Intervention\Image\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProviderReportController extends Controller
{
    public function __construct()
    {
        View::share([

            'sections' => Section::get(),
            'products' => Product::get(),
            'customers' => Customer::get(),
            'providers' => Provider::get(),

        ]);
    }


    # index
    public function Index()
    {

        $data = ProviderReport::with('Provider','Customer')->latest()->get();
        $name = 'تقارير المندوب';
        $route = route('addProviderReport');

        return view('providerReports.providerReports',compact('data', 'name','route'));
    }
    # index
    public function Show($id)
    {
        $providerReport = ProviderReport::findOrFail($id);

        return view('providerReports.showReport',compact('providerReport'));
    }


    # add product
    public function Create()
    {
        $products = Product::all();
        $sections = Section::all();
        $customers = Customer::all();
        $providers = Provider::all();
        return view('providerReports.create_report',\compact('providerReport','providers','customers','sections','products'));
    }

    # store
    public function Store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'nullable',
            'build_image'=>'nullable|mimes:jpeg,png,jpg,gif',
            'company_name' => 'required',
            'provider_name' => 'required',
            'customer_name' => 'required',
            'customer_id' => 'nullable|exists:customers,id',
            'provider_id' => 'nullable|exists:providers,id',
            'product_id.*' => 'nullable|exists:products,id',
            'section_id.*' => 'nullable|exists:sections,id',
            'report_id.*' => 'nullable|exists:reports,id',
            'count.*' => 'nullable',
        ]);
        $providerReport = new ProviderReport();
        $providerReport->provider_name        = $request->provider_name;
        $providerReport->company_name         = $request->company_name;
        $providerReport->customer_name         = $request->customer_name;
        $providerReport->comment         = $request->comment;
        $providerReport->customer_id         = $request->customer_id;
        $providerReport->provider_id         = $request->provider_id;

        # upload card image
        if(!is_null($request->build_image))
        {
            # create folder to extension if not exist
            if(!file_exists(base_path('uploads/builds_images')))
            {
                mkdir(base_path('uploads/builds_images'), 0777, true);
            }
            $photo=$request->build_image;
            $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/builds_images/'.$name);
            $providerReport->image  = $name;

        }
        //        Create Product Reports
        foreach ($request->product_id as $key => $value) {
            ProviderReportProduct::create(
                [
                    'product_id' => $value,
                    'section_id' => $request->section_id[$key],
                    'count' => $request->count[$key],
                    'report_id' => $providerReport->id,
                ]
            );
        }

        $providerReport->save();



        MakeReport('بإضافة تفرير المندوب '.$providerReport->name);
        Alert::success('success','تم إضافة  تفرير المندوب');
        return back();
    }

//    # edit
//    public function Edit($id)
//    {
//        $providerReport = ProviderReport::findOrFail($id);
//        $products = Product::all();
//        $sections = Section::all();
//        $customers = Customer::all();
//        $providers = Provider::all();
//        return view('providerReports.edit_report',\compact('providerReport','providers','customers','sections','products'));
//    }
//
//    # update
//    public function Update(Request $request)
//    {
//        $providerReport = ProviderReport::findOrFail($request->id);
//        $providerReport->provider_name         = $request->provider_name;
//        $providerReport->company_name         = $request->company_name;
//        $providerReport->customer_name         = $request->customer_name;
//        $providerReport->comment         = $request->comment;
//        $providerReport->customer_id         = $request->customer_id;
//        $providerReport->provider_id         = $request->provider_id;
//
//        # upload build image
//        if(!is_null($request->build_image))
//        {
//            File::delete('uploads/builds_images/'.$providerReport->build_image);
//            $photo=$request->build_image;
//            $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
//            Image::make($photo)->save('uploads/builds_images/'.$name);
//            $providerReport->build_image  = $name;
//            $providerReport->save();
//        }
////        Create Product Reports
//        foreach ($request->product_id as $key => $value) {
//            ProviderReportProduct::create(
//                [
//                    'product_id' => $value,
//                    'section_id' => $request->section_id[$key],
//                    'count' => $request->count[$key],
//                    'report_id' => $providerReport->id,
//                ]
//            );
//        }
//        $providerReport->save();
//        MakeReport('بتحديث تقرير المندوب '.$providerReport->id);
//        Alert::success('success','تم تحديث  تقرير المندوب');
//        return back();
//    }


    # delete Product
    public function DeleteProviderReport($id)
    {

        $ProvideReport = ProviderReport::where('id',$id)->first();
        File::delete('uploads/builds_images/'.$ProvideReport->build_image);
        MakeReport('بحذف تقرير المندوب ');
        $ProvideReport->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
