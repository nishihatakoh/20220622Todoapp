<?php

namespace App\Http\Controllers;

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
        $form=$request->all();
        Category::create($form);
        return redirect('/category');
    }
    public function update(Request $request)
    {
        $this->validate($request, Category::$rules);
        $form=$request->all();
        Category::where('id', $request->id)->update($form);
        unset($form['_token']);
        return redirect('/category');
    }
}
