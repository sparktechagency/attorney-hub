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
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\AttorneyStoreRequest;
use App\Http\Services\Auth\AuthService;
class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function getRegister(){
        // $commons['title'] = 'Login';
        // $commons['sub_title'] = 'Login';
        // $commons['main_menu'] = 'Login';
        // $commons['sub_menu'] = 'Login';
        // $commons['current_menu'] = 'Login';

        $areas = Area::all();
        $categories = Category::all();
        //dd($areas);
        return view('frontend.register', compact('areas', 'categories'));
    }

    /*process register form*/
    public function postRegister(AttorneyStoreRequest $request) {
        $result = $this->authService->register($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Attorney registered successfully'
        ]);
    }

}