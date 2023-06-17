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
use Image;
use App\Models\Email;
use View;
use DB;
use Validator;
use App\Models\Customer;
use App\Models\Files;
use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{
    public function __construct()
    {
        View::share([
            
        ]);
    }
    # home
    public function Home(Request $request)
    {

        return view('welcome');

    }

   

 
}
