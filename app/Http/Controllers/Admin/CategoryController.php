<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use Input, Auth;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::paginate(20);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category;

        return view('admin.category.edit', compact('category'));
    }

    public function store()
    {
        $category = new Category(Input::all());
        $category->save();

        return redirect(route('admin.categories.index'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);

        $category->fill(Input::all());

        $category->save();

        return back()->with('info', 'Modifications bien enregistrées.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect(route('admin.categories.index'));
    }


}
