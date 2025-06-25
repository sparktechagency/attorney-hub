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

        dd('test');
        try {
            if ($request->role == 'attorny') {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255|unique:users,email',
                    'zipCode' => 'required',
                    'category_id' => 'required',
                    'license_number' => 'required',
                    'password' => 'required|min:6'
                ]);

                //dd($request->all());

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => 'attorny',
                    'status' => 1,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Attorney registered successfully'
                ], 200);
            }

            return response()->json([
                'error' => 'Invalid role specified'
            ], 400);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred during registration. Please try again.'
            ], 500);
        }
    }

}