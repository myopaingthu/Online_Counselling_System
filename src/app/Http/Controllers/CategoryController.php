<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display category choose page without default category.
     *
     * @return \Illuminate\Http\Response
     */
    public function userCategoryIndex()
    {
        $categories = Category::notDefault()
            ->get();
        return view('users.category')->with('categories', $categories);
    }
}
