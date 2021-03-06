<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $items = todo::with('category')->get();
        $categories = Category::all();
        return view('index',['items' => $items, 'categories' => $categories]);
    }
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form=$request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/')->with('message','Todoを作成しました');
    }
    public function find(Request $request)
    {
        $items = Todo::where('content', 'LIKE',"%{$request->input}%")->Where('category_id',$request->cate)->get();
        $param = [
            'input' => $request->input,
            'cate' => $request->cate,
            'categories' => Category::all(),
            'items' => $items
        ];
        return view('index', $param);
    }
    public function update(Request $request)
    {   
        $this->validate($request, Todo::$rules);
        $form=$request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/')->with('message','Todoを更新しました');
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message','Todoを削除しました');
    }
}
