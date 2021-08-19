@extends('backend.layouts.main')

@section('style')
<style>
     body{
         background-color: pink;
     }
    </style>
@endsection

@section('content')
<h1>you can edit post her</h1>

<form action="{{route('update',['id'=>$posts->id])}}" method="POST" enctype="multipart/form-data" >
@csrf
<div class="mb-3">
  <label for="title" class="form-label">title</label>
  <input type="text" class="form-control" name="title"  value="{{$posts->title}}">
</div>

<div class="mb-3">
  <label for="content" class="form-label">content</label>
  <input type="text" class="form-control" name="content" value="{{$posts->content}}">
</div>

<div class="mb-3">
  <label for="image" class="form-label">image</label>
  <input type="file" class="form-control" name="photo">
</div>

<div class="mb-3">
<button type="submit" class="btn btn-primary" name="submit">update</button>
</div>


</form>

@endsection