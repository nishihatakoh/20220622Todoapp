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
.main_table-items{
  padding:10px 0;
  display:flex;
  justify-content: space-between;
}
.main_table-forms{
  display:flex;
  padding-right:30px;
}
.main_table-update input{
  margin:0 20px;
  color:white;
  background-color:blue;
  padding:5px 15px;
  border:none;
  border-radius: 7px;
}
.main_table-update input:hover{
  cursor: pointer;
}
.main_table-delete input{
  color:white;
  background-color:red;
  padding:5px 15px;
  border:none;
  border-radius: 7px;
}
.main_table-delete input:hover{
  cursor: pointer;
}
.main_table-content{
  border:none;
  text-decoration:none;
}
.main_table-content:focus{
  outline:none;
}
</style>
@section('content')
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
          <input type="text" name="content" class="main_table-content" value="{{$item->content}}">
          <div class="main_table-forms">
            <form class="main_table-update" action="{{ route('category.update', ['id' => $item->id]) }}" method="POST">
              @csrf
              <input type="submit" value="更新">
            </form>
            <form class="main_table-delete" action="/category/delete" method="POST">
              @csrf
              <input type="submit" value="削除">
            </form>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection