<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;

use App\Models\Department;


use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getDepartmentsByOffice(Request $request){
        //dd($request->old_association_id);

        $departments = Department::where('status', 1)
            ->where('belongs_to', $request->office_id)
            ->pluck('name', 'id');

        if (isset($request->old_department_id)){
            $old_department_id = $request->old_department_id;
        }else{
            $old_department_id = '';
        }

        return view('backend.pages.ajax_blades.departments', compact('departments', 'old_department_id'));
    }



}
