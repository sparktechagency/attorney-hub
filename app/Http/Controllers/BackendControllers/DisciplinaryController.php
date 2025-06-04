<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\DisciplinaryAction;
use App\Models\TakenDisciplinaryActionAgainstEmployee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class DisciplinaryController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Add Disciplinary Action';
        $commons['content_title'] = 'Create a disciplinary action';
        $commons['main_menu'] = 'action';
        $commons['current_menu'] = 'disciplanry_action';

        $disciplines = DisciplinaryAction::where('status',1)->paginate(5);

        return view('backend.pages.disciplinaryAction.create',compact('commons','disciplines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'action_name' => 'required|unique:disciplinary_actions',
        ]);

        $data = new DisciplinaryAction();
        $data->action_name = $request->action_name;
        $data->slug = strtolower(str_replace(' ', '_', $request->action_name));
        $data->status = 1;
        $data->created_at = Carbon::now();
        $data->created_by = Auth::user()->id;
        $data->save();

        return redirect()
                ->route('disciplinary.index')
                ->with('success', 'Disciplinary Action created successfully!');

   }
   public function create()
   {
        $commons['page_title'] = 'Take Disciplinary Action';
        $commons['content_title'] = 'Take a disciplinary action';
        $commons['main_menu'] = 'action';
        $commons['current_menu'] = 'take_action';

        $departments = Department::where('status',1)->get();
        $employees = '';
        return view('backend.pages.disciplinaryAction.index',compact('commons','departments','employees'));
   }

   public function employee_list(Request $request)
   {
        $commons['page_title'] = 'Take Disciplinary Action';
        $commons['content_title'] = 'Take a disciplinary action';
        $commons['main_menu'] = 'action';
        $commons['current_menu'] = 'take_action';

        $request->validate([
            'department' => 'required',
        ]);

        // dd($request->department);

        $departments = Department::where('status',1)->get();

        $employees = User::join('departments', 'users.department_id', '=', 'departments.id')
        ->where('users.department_id', $request->department)
        ->where('users.status',1)
        ->select('users.*')
        ->with(['createdBy', 'updatedBy'])
        ->paginate(3);

        // dd($employees);

        $disciplinary_actions = DisciplinaryAction::all();

        return view('backend.pages.disciplinaryAction.index',compact('commons','departments','employees','disciplinary_actions'));
   }

   public function disciplinary_action(Request $request)
   {
        $request->validate([
            'disciplinary_action' => 'required',

        ]);

        if(!$request->disciplinary_action)
        {
            return redirect()
                    ->route('disciplinary.create')
                    ->with('warning', 'Disciplinary Action Should Be Selected');
        }
        $data = new TakenDisciplinaryActionAgainstEmployee();
        $data->disciplinary_action = $request->disciplinary_action;
        $data->employee_id = $request->employee_id;
        if($request->punishment_start_date)
        {
            $data->punishment_start_date = $request->punishment_start_date;
        }
        if($request->punishment_end_date)
        {
            $data->punishment_end_date = $request->punishment_end_date;

            if($request->punishment_start_date)
            {
                if($request->punishment_end_date<=$request->punishment_start_date)
                {
                    return redirect()
                    ->route('disciplinary.create')
                    ->with('warning', 'Punishment End Date Should Be Before Punishment Start Date');
                }
            }
        }
        if($request->action_reason)
        {
            $data->action_reason = $request->action_reason;
        }
        $data->status = 1;
        $data->created_at = Carbon::now();
        $data->created_by = Auth::user()->id;
        $data->save();

        return redirect()
        ->route('disciplinary.create')
        ->with('success', 'Disciplinary Action Taken successfully!');
   }


   public function punishedEmployeeList()
   {
        $commons['page_title'] = 'Punished Employee List';
        $commons['content_title'] = 'Punished Employee List';
        $commons['main_menu'] = 'action';
        $commons['current_menu'] = 'punishedEmployee_List';

        $actions = DisciplinaryAction::where('status',1)->get();
        $punishedEmplyoees = '';
        return view('backend.pages.disciplinaryAction.punishedEmployeeList',compact('commons','actions','punishedEmplyoees'));

   }

   public function showPunishedEmployeeList(Request $request)
   {
        $commons['page_title'] = 'Punished Employee List';
        $commons['content_title'] = 'Punished Employee List';
        $commons['main_menu'] = 'action';
        $commons['current_menu'] = 'punishedEmployee_List';

        $request->validate([
            'disciplinaryAction' => 'required',
        ]);

        $punishedEmplyoees = TakenDisciplinaryActionAgainstEmployee::where('disciplinary_action',$request->disciplinaryAction)
            ->where('status',1)
            ->with(['getEmployee',])
            ->get();

         //dd($punishedEmplyoees);
        $actions = DisciplinaryAction::where('status',1)->get();

        return view('backend.pages.disciplinaryAction.punishedEmployeeList',compact('commons','punishedEmplyoees','actions'));

   }

}