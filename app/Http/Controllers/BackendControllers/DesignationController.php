<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DesignationStoreRequest;
use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Designation';
        $commons['content_title'] = 'List of All Designation';
        $commons['main_menu'] = 'designation';
        $commons['current_menu'] = 'designation';

        $designation = Designation::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($departments);
        return view('backend.pages.designation.index',
            compact(
                'commons',
                'designation'
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
        $commons['page_title'] = 'Designation';
        $commons['content_title'] = 'Create a New Designation';
        $commons['main_menu'] = 'designation';
        $commons['current_menu'] = 'designation';

        //$offices = Office::where('status', 1)->get();
        $designation = Designation::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.designation.create',
            compact(
                'commons',
                'designation'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationStoreRequest $request)
    {
        $designation = new Designation();
        $designation->name = $request->validated('designation_name');
        $designation->slug = strtolower(str_replace(' ', '_', $request->validated('designation_name')));
        $designation->status = 1;
        $designation->created_at = Carbon::now();
        $designation->created_by = Auth::user()->id;
        $designation->save();

            return redirect()
                ->route('designation.create')
                ->with('success', 'Designation created successfully!');

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
        //
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