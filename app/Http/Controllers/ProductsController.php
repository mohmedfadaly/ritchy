<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Section;
use App\Models\Product;
use View;
use Image;
use File;
use Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        View::share([

            'sections' => Section::get(),

        ]);
    }


    # index
    public function Index()
    {
        $data = Product::with('Section')->where('kind','1')->latest()->get();
        $name = 'المنتجات';
        $route = route('addproducts');

        return view('products.products',compact('data', 'name','route'));
    }

    # index
    public function Shows()
    {
        $data = Product::with('Section')->where('kind','2')->latest()->get();
        $name = 'العروض';
        $route = route('AddShows');

        return view('products.products',compact('data', 'name','route'));
    }

    # index
    public function backets()
    {
        $data = Product::with('Section')->where('kind','3')->latest()->get();
        $name = 'البوكسات';
        $route = route('Addbackets');

        return view('products.products',compact('data', 'name','route'));
    }


    # add product
    public function Addproduct()
    {
        $name = 'إضافة منتج';
        $kind = '1';
        return view('products.add_product',compact('kind', 'name'));
    }

    # add Shows
    public function AddShows()
    {
        $name = 'إضافة عرض';
        $kind = '2';
        return view('products.add_product',compact('kind', 'name'));
    }

    # add backets
    public function Addbackets()
    {
        $name = 'إضافة بوكس';
        $kind = '3';
        return view('products.add_product',compact('kind', 'name'));
    }

    # store
    public function Store(StoreProduct $request)
    {
        $product = new Product;
        $product->name           = $request->name;
        $product->desc           = $request->desc;
        $product->price          = $request->price;
        $product->section_id     = $request->section_id;
        $product->kind           = $request->kind;

        # upload card image
        if(!is_null($request->card_image))
        {
            # create folder to extension if not exist
            if(!file_exists(base_path('uploads/products_images')))
            {
                mkdir(base_path('uploads/products_images'), 0777, true);
            }
            $photo=$request->card_image;
            $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/products_images/'.$name);
            $product->image  = $name;

        }
        $product->save();



        MakeReport('بإضافة منتج '.$product->name);
        Alert::success('success','تم إضافة المنتج');
        return back();
    }

    # edit
    public function Edit($id)
    {
        $data = Product::findOrFail($id);
        return view('products.edit_product',\compact('data'));
    }

    # update
    public function Update(UpdateProduct $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name         = $request->name;
        $product->desc         = $request->desc;
        $product->price        = $request->price;
        $product->section_id     = $request->section_id;

        $product->save();

        # upload card image
        if(!is_null($request->card_image))
        {
            File::delete('uploads/products_images/'.$product->image);
            $photo=$request->card_image;
            $name = date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/products_images/'.$name);
            $product->image  = $name;
            $product->save();
        }

        MakeReport('بتحديث منتج '.$product->name);
        Alert::success('success','تم تحديث المنتج');
       return back();
    }


    # delete Product
    public function DeleteProduct($id)
    {

        $Product = Product::where('id',$id)->first();
        File::delete('uploads/products_images/'.$Product->image);
        MakeReport('بحذف منتج ');
        $Product->delete();
        Alert::success('success','تم الحذف');
        return back();
    }
}
