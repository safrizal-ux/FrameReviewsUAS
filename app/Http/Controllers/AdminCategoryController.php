<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable'
        ]);

        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('categories'));
    }

    public function edit(Category $category)
{
    return view('admin.category.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category->update($request->only(['name', 'description']));

    return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
}



    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully.');
    }
}
