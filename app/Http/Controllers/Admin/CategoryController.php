<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $commons['page_title'] = 'Category';
        $commons['content_title'] = 'Add Category';
        $commons['main_menu'] = 'category';
        $commons['current_menu'] = 'category_menu';

        $categories = Category::paginate(5);

        return view('backend.pages.category.create', compact('commons','categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'short_description' => 'nullable|string',
        ]);

        $category = new Category();
        $category->name = $request->name ?? '';
        $category->slug = $request->slug ?? '';
        $category->short_description = $request->short_description ?? '';
        $category->created_at = now();
        $category->created_by = auth()->id();
        $category->save();

       return redirect()->back()->with('success', 'Zip Code added successfully!');
    }
}
