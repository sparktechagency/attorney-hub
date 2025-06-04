<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AttendenceLog;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SetOfficeTime;
use Carbon\Carbon;

use Illuminate\Support\Facades\View;


class ReportController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Attendance Report';
        $commons['content_title'] = 'Attendance Report';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'attendance_report';

        $emp = User::where('status',1)->with(['createdBy','updatedBy'])->get();

        $employees = AttendenceLog::where('status',1)
        ->with(['getName'])
        ->orderBy('employee_id','asc')
        ->paginate(20);

        //dd($employees);

        return view('backend.pages.dailyAttendence.show',compact('commons','emp','employees'));
    }

    public function store(Request $request)
    {

        $commons['page_title'] = 'Attendance Report';
        $commons['content_title'] = 'Attendance Report';
        $commons['main_menu'] = 'attendance';
        $commons['current_menu'] = 'attendance_report';

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'employee_id' => 'required',
        ]);

        $officeTime = SetOfficeTime::where('status',1)->first();
        $officeTime = $officeTime->startTime;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $employee_id = $request->employee_id;

        $name = User::where('status',1)->where('id',$employee_id)->first();
        $dept = Department::where('status',1)->where('id',$name->department_id)->first();
        $des = Designation::where('status',1)->where('id',$name->designation_id)->first();

        $dateRange = Carbon::parse($startDate)->range($endDate)->toArray();
        $reportData = [];

        //dd($dateRange);

        foreach($dateRange as $date)
        {
            $attendance = AttendenceLog::where('attendance_date',$date)->where('employee_id',$employee_id)->first();
            //dd($attendance);
            // $lateCalc = '';
             $holiday = '';
            // if($attendance)
            // {
            //     if($attendance->inTime > $officeTime->startTime)
            //     {
            //         $lateCalc = 1;
            //         $time = intval($attendance->inTime) - intval($officeTime->startTime);
            //     }
            //     $totalDuty = intval($attendance->outTime) - intval($attendance->inTime);
            // }


            $data = [

                'date' => $date->format('Y-m-d'),
                'status' => $attendance ? $attendance : '',
                'inTime' => $attendance ? $attendance->inTime : '',
                'outTime' => $attendance ? $attendance->outTime : '',
                'isFriday' => $date->isFriday(),
                'holiday' => $holiday ? $holiday : '',
            ];

            $reportData[] = $data;
        }

        return view('backend.pages.dailyAttendence.format',compact('commons','reportData','name','dept','des','officeTime'));


    }

    public function generatePdf(Request $request)
    {

        $name = $request->name;
        $date = $request->date;
        $designation = $request->designation;
        $department = $request->department;
        $reportData = json_decode($request->input('reportData'),true);
        $officeTime = $request->officeTime;

        //dd($reportData);


         $fileName = 'attendance-report.pdf';


        $mPdf = new \Mpdf\Mpdf([
            'margin_left' => 5,
            'margin_right' => 5,
            'margin_top' => 10,
            'margin_bottom' => 15,
            'margin_header' => 5,
            'margin_footer' => 5,
            'default_font' => 'nikosh',
            'default_font_size' => 10,
        ]);
        $html = View::make('backend.pages.dailyAttendence.pdf',compact('name','date','designation','department','reportData','officeTime'))->render();

        //$stylesheet = file_get_contents('pdf/css/pdf.css');
        //$mPdf->WriteHTML($stylesheet,1);
        $mPdf->WriteHTML($html);
        // $mPdf->WriteHTML($html);
        $mPdf->Output($fileName, 'D');

    }
}