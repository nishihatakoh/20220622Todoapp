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
        return view('index',['items' => $items, 'categories' =>$categories]);
    }
}
