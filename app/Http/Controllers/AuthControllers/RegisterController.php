<?php

namespace App\Http\Controllers\AuthControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Attorney;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\Category;

class RegisterController extends Controller
{

    public function __construct()
    {

    }


    public function getRegister(){
        // $commons['title'] = 'Login';
        // $commons['sub_title'] = 'Login';
        // $commons['main_menu'] = 'Login';
        // $commons['sub_menu'] = 'Login';
        // $commons['current_menu'] = 'Login';

        $areas = Area::all();
        $categories = Category::all();
        return view('frontend.register', compact('areas', 'categories'));
    }

    /*process register form*/
    public function postRegister(Request $request) {
    try {

        if ($request->role == 'attorny') {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'zipCode' => 'required',
                'category_id' => 'required',
                'license_number' => 'required',
                'password' => 'required'
            ]);

         

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'zipCode' => $validatedData['zipCode'],
                'category_id' => $validatedData['category_id'],
                'license_number' => $validatedData['license_number'],
                'user_type' => 'attorny',
                'created_by' => Auth::check() ? Auth::user()->id : null,
                'password' => Hash::make($validatedData['password']),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Attorney registered successfully'
            ], 200);
        }

        return response()->json([
            'error' => 'Invalid role specified'
        ], 400);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'An error occurred during registration. Please try again.'
        ], 500);
    }    }
}
