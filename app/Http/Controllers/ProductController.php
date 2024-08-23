<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();

        return view('product.products')->with(compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $add_product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($add_product) {
            return redirect('products');
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

        $edit_product = Product::where('id', $id)->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->descriptions
        ]);

        if ($edit_product) {
            return redirect('products');
        } else {
            return redirect()->back()->withErrors($validated);
        }
    }

    public function destroy($id)
    {
        $delete_product = Product::where('id', $id)->delete();

        if ($delete_product) {
            return redirect('products');
        }
    }

    public function add_product()
    {

        $categories = Category::all()->toArray();

        return view('product.add_product')->with(compact('categories'));
    }

    public function edit_product($id)
    {

        $categories = Category::all()->toArray();

        $product = Product::where('id', $id)->get()->toArray();

        return view('product.edit_product')->with(compact('categories','product'));
    }
}
