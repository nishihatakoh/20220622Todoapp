<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return view('category',['items' => $items]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Category::$rules);
        $category = new Category;
        $form=$request->all();
        $category->fill($form)->save();
        unset($form['_token']);
        return redirect('/category');
    }
    public function update(Request $request)
    {   
        dd($request->all());
        $this->validate($request, Category::$rules);
        $category = Category::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $category->fill($form)->save();
        return redirect('/category');
    }
    public function delete(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/category');
    }
}

