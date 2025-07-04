<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;





class DashboardController extends Controller
{

    public function __construct(){

    }

    public function getDashboard(){
        if(Auth::user()->user_type == 'admin')
        {
            $commons['page_title'] = 'Admin Dashboard';
            $commons['content_title'] = 'Show dashboard';
            $commons['main_menu'] = 'dashboard';
            $commons['current_menu'] = 'dashboard';
            return view('backend.pages.dashboard',
            compact(
                'commons',
            )
        );

        }
        else{
            return redirect()->route('home')
            ->with('warning', 'You are not authorized to access this page.');
        }


    }

    public function getAttorneyProfile(){
        return view('frontend.attorney_dashboard');
    }

    public function getAttorneyProfileEdit($uuid){
        $categories = Category::all();
        $user = User::where('uuid', $uuid)->first();
        // dd($categories);
        return view('frontend.attorney_dashboard_edit', compact('categories', 'user'));
    }

}
