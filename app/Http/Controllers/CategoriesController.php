<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        //dump($categories);
        return view('categories.index',[
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoriesRequest $request)
    {
        //dd($request->all());

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect( route('categories.index') );


    }

    public function edit(Category $category)
    {
        return view('categories.edit',[
            'category' => $category
        ]);
    }

    public function update(CategoriesRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect (route ('categories.index'));
    }

    public function destroy(Category $category)
    {
//        dd($category->delete());
        $category->delete();
        return redirect( route('categories.index'));
    }

}
