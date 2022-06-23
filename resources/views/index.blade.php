@extends('layouts.default')
<style>
  .main{
    width:50%;
    margin:50px auto;
  }
  .main h2{
    font-size:25px;
    padding:25px 0;
  }
  .main-form-content{
    width:50%;
    height:30px;
  }
  .main-form-select{
    width:20%;
    height:30px;
  }
  .main-form-bottom{
    padding:7px 60px;
    margin-left:50px;
    color:white;
    background-color:black;
    border:none;
    border-radius: 7px;
  }
  .main-form-bottom:hover{
    cursor: pointer;
  }
</style>
@section('content')
<div class="main">
  <h2>新規作成</h2>
  <div class="main-form">
    <form action="/create" method="POST">
      <input type="text" class="main-form-content" name="content">
      <select name="category-content" id="" class="main-form-select">
        <option value="">カテゴリー</option>
        @foreach($items as $item)
        <option value="category_id">{{$item->category->content}}</option>
        @endforeach
      </select>
      <input type="submit" value="作成" class="main-form-bottom">
    </form>
  </div>
  <h2>Todo検索</h2>
  <div>
    <form action="/find" method="POST">
      <input type="text" class="main-form-content" name="content">
      <select name="category-content" id="" class="main-form-select">
        <option value="">カテゴリー</option>
        @foreach($items as $item)
        <option value="category_id">{{$item->category->content}}</option>
        @endforeach
      </select>
      <input type="submit" value="検索" class="main-form-bottom">
    </form>
  </div>
</div>
@endsection