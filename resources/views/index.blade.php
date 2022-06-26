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
  table{
    width:100%;
    text-align:left;
  }
  table tr{
    border-bottom:1px solid #CCCCCC;
  }
  table tr th{
    padding:15px 0 15px 0;
  }
  .table-update-content{
    width:100%;
    border:none;
  }
  .table-update-content:focus{
    outline:none;
  }
  .table-update-bottom{
    background-color:blue;
  border:none;
  color:white;
  border-radius:3px;
  padding:3px 15px;
  }
  .table-update-bottom:hover{
    cursor: pointer;
  }
  .table-delete-bottom{
    background-color:red;
  border:none;
  color:white;
  border-radius:3px;
  padding:3px 15px;
  }
  .table-delete-bottom:hover{
    cursor: pointer;
  }
</style>
@section('content')
<div class="main">
  <h2>新規作成</h2>
  <div class="main-form">
    <form action="/create" method="POST">
      @csrf
      <input type="text" class="main-form-content" name="content">
      <select  name="category_id"  class="main-form-select">
        <option value="">カテゴリー</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->content}}</option>
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
        @foreach($categories as $category)
        <option name="category_id" value="{{$category->id}}">{{$category->content}}</option>
        @endforeach
      </select>
      <input type="submit" value="検索" class="main-form-bottom">
    </form>
  </div>
  <table>
    <tr>
        <th><h3 class="table-ttl-todo">Todo</h3></th>
        <th><h3 class="table-ttl-category">カテゴリ</h3></th>
        <th></th>
        <th></th>
    </tr>
    @foreach($items as $item)
    <tr>
        <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
          @csrf
          <th>
            <input type="text" value="{{$item->content}}" class="table-update-content" name="content">
          </th>
          <th>
            <p>{{$category->content}}</p>
            <input type="hidden" name="category_id"  value="{{$category->id}}">
          </th>
          <th>
            <input type="submit" class="table-update-bottom" value="更新">
          </th>
        </form>
        <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST">
          @csrf
          <th>
            <input type="submit" class="table-delete-bottom" value="削除">
          </th>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection