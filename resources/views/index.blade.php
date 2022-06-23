@extends('layouts.default')

@section('content')
<div>
  <h2>新規作成</h2>
  <div>
    <form action="/create" method="POST">
      <input type="text" name="content">
      <select name="" id="">
        @foreach($items as $item)
        <option value="category_id">{{$item->category->content}}</option>
        @endforeach
      </select>
      <input type="submit" value="作成">
    </form>
  </div>
  <h2>Todo検索</h2>
  <div>
    <form action="/find" method="POST">
      <input type="text" name="content">
      <select name="" id="">
        @foreach($items as $item)
        <option value="category_id">{{$item->category->content}}</option>
        @endforeach
      </select>
      <input type="submit" value="検索">
    </form>
  </div>
</div>
@endsection