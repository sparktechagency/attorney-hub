<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AttendenceLog;
use Auth;
use Carbon\Carbon;


class DailyAttendenceController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Daily Attendence';
        $commons['content_title'] = 'Daily Attendence';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'dailyAttendence';

        return view('backend.pages.DailyAttendence.index',compact('commons'));
    }
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'attendance_date' => 'required',
            'inTime' => 'required',
            'outTime' => 'required',
        ]);

        $employees = User::where('status',1)->latest()->get()->pluck('id');

        //dd(sizeof($employees));

        for($i=0;$i<sizeof($employees);$i++)
        {
            $data = new AttendenceLog();
            $data->employee_id = $employees[$i];
            $data->attendance_date = $request->attendance_date;
            $data->inTime = $request->inTime;
            $data->outTime = $request->outTime;
            $data->created_by = Auth::user()->id;
            $data->created_at = Carbon::now();
            $data->save();
        }

        return redirect()->route('dailyAttendance.index')->with('success','Daily Attendence Get Successfully');
    }
    public function clockInAttendance()
    {
        date_default_timezone_set('Asia/Dhaka');
        $data = new AttendenceLog();
        $data->employee_id = Auth::user()->id;
        $data->attendance_date = date('Y-m-d');
        $timeStamp = time();
        $data->inTime = date('H:i',$timeStamp);
        // $data->outTime = $request->outTime;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();

        return back()->with('success','Your Clock In Time Upadated Successfully');
    }
    public function clockOutAttendance()
    {
        date_default_timezone_set('Asia/Dhaka');
        $timeStamp = time();
        $outTime = date('H:i',$timeStamp);
        $data = AttendenceLog::where('attendance_date',date('Y-m-d'))->where('employee_id',Auth::user()->id)->whereNotNull('inTime')->update(['outTime' => $outTime]);

        return back()->with('success','Your Clock Out Time Upadated Successfully');
    }

}