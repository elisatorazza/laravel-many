@extends('layouts.main')

@section('title')
    Posts
@endsection

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">User</th>
            <th scope="col">Published</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        @if ($post->published)
                            <span class="badge badge-success">Yes</span>
                        @else
                            <span class="badge badge-danger">No</span>
                        @endif
                    </td>   
                </tr>
            @endforeach   
        </tbody>
    </table>

</div>
  
@endsection
