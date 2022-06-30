@extends('layouts.default')
<style>
.main{
  width:50%;
  margin:100px auto;
}
.main_create-form{
  display:flex;
  justify-content: space-between;
}
.main_create-form-content{
  width:70%;
  border-color:#CCCCCC;
}
.main_create-form-submit{
  padding:7px 60px;
  color:white;
  background-color:black;
  border:none;
  border-radius: 7px;
}
.main_create-form-submit:hover{
  cursor: pointer;
}
.main_table{
  margin-top:20px;
  width:100%;
}
.main_table tr{
  border-bottom:1px solid #CCCCCC;
}
.main_table tr th{
  text-align:left;
  padding:10px 0;
}
.main_table tr td{
  padding:10px 0;
}
.main_table-items{
  display:flex;
  justify-content: space-between;
}
.main_table-update{
  width:90%
}
.main_table-content{
  width:90%;
  border:none;
}
.main_table-content:focus{
  outline:none;
}
.main_table-update-bottom{
  background-color:blue;
  border:none;
  color:white;
  border-radius:3px;
  padding:3px 15px;
}
.main_table-update-bottom:hover{
  cursor: pointer;
}
.main_table-delete-bottom{
  background-color:red;
  border:none;
  color:white;
  border-radius:3px;
  padding:3px 15px;
  margin-right:30px;
}
.main_table-delete-bottom:hover{
  cursor: pointer;
}
.errors{
  background-color:pink;
  padding:20px 0;
}
.success-alart{
  background-color:#66FF99;
  padding:20px 0;
}
</style>
@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li class="errors">
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
@if(session('message'))
<ul>
  <li class="success-alart">{{session('message')}}</li>
</ul>
@endif
<div class="main">
  <div>
    <form class="main_create-form" action="/category/create" method="POST">
      @csrf
      <input class="main_create-form-content" type="text" name="content">
      <input class="main_create-form-submit" type="submit" value="作成">
    </form>
  </div>
  <table class="main_table">
    <tr>
      <th>category</th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td>
        <div class="main_table-items">
            <form  action="{{ route('category.update', ['id' => $item->id]) }}" class="main_table-update"method="POST">
              @csrf
              <input type="text" name="content" class="main_table-content" value="{{$item->content}}">
              <input type="submit" class="main_table-update-bottom" value="更新">
            </form>
            <form class="main_table-delete" action="{{ route('category.delete', ['id' => $item->id]) }}" method="POST">
              @csrf
              <input type="submit" class="main_table-delete-bottom" value="削除">
            </form>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection