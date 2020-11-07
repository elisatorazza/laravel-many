@extends('layouts.main')

@section('title')
    {{$post->title}}
@endsection

@section('content')
<div class="container">
    <div class="card" style="width: 600px;">
        <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$post->user->name}}</h6>
        <p class="card-text">{{$post->content}}</p>
        <a href="{{route('posts.edit', $post->id)}}" class="card-link">Edit</a>
        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
            @csrf
            @method('DELETE')
        <input type="submit" value="Delete">
        </form>
        </div>
    </div>
</div>
@endsection