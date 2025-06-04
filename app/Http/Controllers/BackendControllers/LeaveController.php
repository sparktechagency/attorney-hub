<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Add Leave';
        $commons['content_title'] = 'Add Leave';
        $commons['main_menu'] = 'leave';
        $commons['current_menu'] = 'add_leave';

        return view('backend.pages.leave.index',compact('commons'));
    }
}