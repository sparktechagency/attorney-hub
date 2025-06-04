<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Depertment';
        $commons['content_title'] = 'List of All Depertment';
        $commons['main_menu'] = 'depertment';
        $commons['current_menu'] = 'depertment';

        $departments = Department::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($departments);
        return view('backend.pages.department.index',
            compact(
                'commons',
                'departments'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commons['page_title'] = 'Depertment';
        $commons['content_title'] = 'Create a New Depertment';
        $commons['main_menu'] = 'depertment';
        $commons['current_menu'] = 'depertment';

        //$offices = Office::where('status', 1)->get();
        $departments = Department::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.department.create',
            compact(
                'commons',
                'departments'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentStoreRequest $request)
    {
        $department = new Department();
        $department->name = $request->validated('department_name');
        $department->slug = strtolower(str_replace(' ', '_', $request->validated('department_name')));
        $department->status = 1;
        $department->created_at = Carbon::now();
        $department->created_by = Auth::user()->id;
        $department->save();

            return redirect()
                ->route('department.create')
                ->with('success', 'Department created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Department::findOrFail($id);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
