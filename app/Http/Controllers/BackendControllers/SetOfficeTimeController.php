<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetOfficeTime;
use Auth;
use Carbon\Carbon;

class SetOfficeTimeController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Set Office Time';
        $commons['content_title'] = 'Set Office Time';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'setOfficeTime';

        $times = SetOfficeTime::where('status',1)
        ->with('createdBy','updatedBy')
        ->get();
        //dd($times);
        return view('backend.pages.officeTime.index',compact('commons','times'));
    }
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'startTime' => 'required',
            'endTime' => 'required',
        ]);

        //dd($request->startTime);
        //dd($request->endTime);
        $id = 1;
        $data = SetOfficeTime::findOrFail($id);
        $data->startTime = $request->startTime;
        $data->endTime = $request->endTime;
        $data->status = 1;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect()->route('officeTime.index')->with('success', 'Office Time Set Successfully');
    }
}