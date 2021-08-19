@extends('backend.layouts.main')

@section('style')
<style>
     body{
         background-color: grey;
     }
    </style>
@endsection

@section('content')
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data" >
@csrf
<div class="mb-3">
  <label for="title" class="form-label">title</label>
  <input type="text" class="form-control" name="title" placeholder="title">
</div>

<div class="mb-3">
  <label for="content" class="form-label">content</label>
  <input type="text" class="form-control" name="content" placeholder="content">
</div>

<div class="mb-3">
  <label for="image" class="form-label">image</label>
  <input type="file" class="form-control" name="photo">
</div>

<div class="mb-3">
<button type="submit" class="btn btn-primary" name="submit">ADD</button>
</div>
</form>

@endsection
