<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = todo::with('categories')->get();
        $categories = Category::all();
        return view('index',['items' => $items, 'categories' => $categories]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form=$request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }
}
