@extends('backend.layouts.main')

@section('content') 
    <div class="row mx-5 my-5 ">
       @foreach ($posts as $post)

        <div class="card" style="width: 18rem;">
        <img src="images/{{$post->photo }}" class="card-img-top" alt="{{$post->title}}">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            <a href="{{route('edit',['id'=>$post->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('delete',['id'=>$post->id])}}" class="btn btn-primary">Delete</a>
        </div>
        </div>
        

@endforeach
     </div>
@endsection