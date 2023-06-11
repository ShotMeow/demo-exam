<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());

        session()->flash('success', 'Категория ' . $request->name . ' успешно создана');
        return back();
    }

    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        session()->flash('success', 'Категория ' . $category->name .  ' успешно удалена');
        return back();
    }
}
