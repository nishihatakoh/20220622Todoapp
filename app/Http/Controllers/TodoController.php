<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = todo::with('category')->get();
        return view('index',['items' => $items]);
    }
}
