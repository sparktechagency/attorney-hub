<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Attorney;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        
    }

    public function getHome(){
        $categories = Category::where('status', 1)->get();
        return view('frontend.index', compact('categories'));

    }

    public function searchAttorney(Request $request){

        //dd('hello');
        $request->validate([
            'zip_code' => 'required|numeric',
        ]);
        $searchTerm = $request->input('zip_code');
        $attorneys = User::where('user_type', 'attorny')
            ->where('zip', 'like', '%'.$searchTerm.'%')
            ->where('status', 1)
            ->where(function($query) {
                $query->where('payment_status', 1)
                      ->orWhere('free_trial', 1);
            })
            ->where('end_date', '>=', now())
            ->get();

        //return $attorneys;

        return view('frontend.search_results', compact('attorneys'));
    }

    public function getAbout(){
        return view('frontend.about');
    }

    public function filterAttorney(Request $request){
        $searchResults = $request->input('attorneys');
        $sortBy = $request->input('sort_by', 'name');
        $order = $request->input('order', 'asc');
        $keyword = $request->input('keyword');

        if (is_string($searchResults)) {
            $attorneys = json_decode($searchResults, true);
        } else {
            $attorneys = $searchResults;
        }

        if (!empty($attorneys)) {
            $attorneys = array_filter($attorneys, function($attorney) {
                return isset($attorney['user_type']) && $attorney['user_type'] === 'attorny';
            });
        }

        if ($keyword && !empty($attorneys)) {
            $attorneys = array_filter($attorneys, function($attorney) use ($keyword) {
                $searchableFields = [
                    'name', 'company_name', 'email', 'mobile', 'address1', 'address2',
                    'city', 'state', 'zip', 'area_of_practice',
                    'state_of_bar_admission_and_court', 'year_of_admission_to_bar',
                    'website', 'login_name',
                ];
                
                foreach ($searchableFields as $field) {
                    if (isset($attorney[$field]) && 
                        stripos($attorney[$field], $keyword) !== false) {
                        return true;
                    }
                }

                if (isset($attorney['area_of_practice']) && !empty($attorney['area_of_practice'])) {
                    $areaOfPractice = $attorney['area_of_practice'];
                    
                    if (is_string($areaOfPractice)) {
                        $categoryIds = json_decode($areaOfPractice, true);
                    } else {
                        $categoryIds = $areaOfPractice;
                    }
                    
                    if (is_array($categoryIds)) {
                        $categoryNames = Category::whereIn('id', $categoryIds)
                            ->pluck('name')
                            ->toArray();
        
                        foreach ($categoryNames as $categoryName) {
                            if (stripos($categoryName, $keyword) !== false) {
                                return true;
                            }
                        }
                    }
                }
                
                return false;
            });
        }


        if (!empty($attorneys)) {
            usort($attorneys, function($a, $b) use ($sortBy, $order) {
                $aValue = $a[$sortBy] ?? '';
                $bValue = $b[$sortBy] ?? '';
                
                if ($order === 'desc') {
                    return strcasecmp($bValue, $aValue);
                }
                return strcasecmp($aValue, $bValue);
            });
        }

        return view('frontend.search_results', compact('attorneys'));
    }

    public function getCategoryWiseAttorney($uuid){
        // return $uuid;
        $category = Category::where('uuid', $uuid)->first();
        $attorneys = User::where('user_type', 'attorny')
            ->whereJsonContains('area_of_practice', (string)$category->id)
            ->where('status', 1)
            ->where(function($query) {
                $query->where('payment_status', 1)
                      ->orWhere('free_trial', 1);
            })
            ->where('end_date', '>=', now())
            ->get();

        //return $attorneys;    

        return view('frontend.search_results', compact('attorneys'));
    }


}
