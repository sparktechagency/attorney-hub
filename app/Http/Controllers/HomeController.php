<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attorney;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['logged']);
    }

    public function getHome(){
        $categories = Category::where('status', 1)->get();
        return view('frontend.index', compact('categories'));

    }

    public function searchAttorney(Request $request){

        //dd('hello');
        $request->validate([
            'zip_code' => 'required|numeric|digits:4',
        ]);
        $searchTerm = $request->input('zip_code');
        $attorneys = User::where('zipCode', 'LIKE', "%{$searchTerm}%")
            ->get();

        //dd($attorneys);

        return view('frontend.search_results', compact('attorneys'));
    }

    public function getAbout(){
        return view('frontend.about');
    }


}
