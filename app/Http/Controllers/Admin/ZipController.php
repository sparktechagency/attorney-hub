<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class ZipController extends Controller
{
    public function getZipCode()
    {
        $commons['page_title'] = 'Zip Code';
        $commons['content_title'] = 'Add Zip Code';
        $commons['main_menu'] = 'zip';
        $commons['current_menu'] = 'add_zip';

        $areas = Area::paginate(5);

        return view('backend.pages.zip_code.create', compact('commons','areas'));
    }

    public function storeZipCode(Request $request)
    {
        
        $request->validate([
            'zipCode' => 'required|numeric|unique:areas',
            'city' => 'required|string|max:100',
        ]);

        $area = new Area();
        $area->zipCode = $request->zipCode;
        $area->city = $request->city;
        $area->save();  


        return redirect()->back()->with('success', 'Zip Code added successfully!');
    }
}
