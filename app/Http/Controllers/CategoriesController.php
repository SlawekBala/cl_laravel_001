<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function index(Request $request)
    {
//       $categories = Category::paginate(10);
//
//        return view('categories.index', [
//            'categories' => $categories
//
//        ]);

        $search = $request->get('search', '');

        if ($search != '') {
            return Category::where('name', 'LIKE', '%'.$search.'%')
                ->get();

        } else {
            return Category::all();
        }

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return $category;
    }

    public function edit(Category $category)
    {
        return $category;
    }

    public function update(CategoriesRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return $category;
    }

    public function destroy(Category $category)
    {
        return ['status' => $category->delete() ] ;


    }



}
