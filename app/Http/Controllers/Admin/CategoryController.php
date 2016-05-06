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
}
