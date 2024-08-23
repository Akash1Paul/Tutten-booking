<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toArray();

        return view('category.categories')->with(compact('categories'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $add_category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($add_category) {
            return redirect('categories');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $edit_category = Category::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($edit_category) {
            return redirect('categories');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }

    public function destroy($id)
    {
        $delete_category = Category::where('id', $id)->delete();

        if($delete_category)
        {
            return redirect('categories');
        }
    }

    public function edit_category($id)
    {
        $category = Category::where('id', $id)->get()->toArray();

        return view('category.edit_category')->with(compact('category'));
    }
}
