<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\User;
use DB;

class EmployeeController extends Controller
{
    public function create()
    {
        $commons['page_title'] = 'Add Employee';
        $commons['content_title'] = 'Create a New Employee';
        $commons['main_menu'] = 'employee';
        $commons['current_menu'] = 'employee';

        return view('backend.pages.employee.create',compact('commons'));
    }

    public function index()
    {
        $commons['page_title'] = 'Employee List';
        $commons['content_title'] = 'Employee List';
        $commons['main_menu'] = 'employee list';
        $commons['current_menu'] = 'employee list';

        $designations = Designation::all();
        $departments = Department::all();

        // $data = User::join('designations', 'designations.id', '=', 'users.designation_id')
        // ->join('departments', 'departments.id', '=', 'users.department_id')
        // ->where('users.designation_id', 1)
        // ->select('users.*','departments.name')

        // ->get();
        // dd($data);

        return view('backend.pages.employee.index',compact('commons','designations','departments'));
    }


    public function employee_list(Request $request)
    {
        $request->validate([
            'designation' => 'required',
        ]);



        $data = User::join('designations', 'designations.id', '=', 'users.designation_id')
                ->join('departments', 'departments.id', '=', 'users.department_id')
                ->where('users.designation_id', $request->designation)
                ->select('users.*','departments.name')
                ->with('createdBy','updatedBy')
                ->get();



        return response()->json($data);
    }
}
