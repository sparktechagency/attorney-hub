<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserInfoImport;

class UserInfoController extends Controller
{
    public function index()
    {

        $commons['page_title'] = 'ADD Excel Files';
        $commons['content_title'] = 'ADD Excel Files';
        $commons['main_menu'] = 'Excel';
        $commons['current_menu'] = 'Excel_userinfo';



        return view('backend.pages.userinfo.index', compact('commons'));

    }


    public function store(Request $request)
{
//    dd($request->all());
    // Get the uploaded file
    $file = $request->file('file');

    // Validate the uploaded file
    $validated = $request->validate([
        'file' => 'required|mimes:xlsx,xls|max:5120'
    ], [
        'file.mimes' => 'The uploaded file must be a spreadsheet in either xlsx or xls format.',
        'file.max' => 'The uploaded file must be smaller than 5MB.'
    ]);

    // return $validated;

    // Create a new CheckTimeImport object with the date range filter
    $import = new UserInfoImport();

    // Import the file using the Excel facade
    Excel::import($import, $file);

    // Get the imported data that passed the date range filter
    $imported_data = $import->getData();

    // dd( $imported_data);

    // Loop through the imported data and create CheckTime models
    foreach ($imported_data as $data) {
        UserInfo::create($data);
    }

    // Get the total number of imported rows
    $rows = $import->getRowCount();

    // Redirect back to the index page with a success message
    return redirect()->route('userinfo.index')->with('success', 'Imported UserInfo Successfully');
}











}
