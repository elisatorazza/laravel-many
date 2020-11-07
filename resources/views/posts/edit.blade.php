@extends('layouts.main')

@section('title')
    Edit
@endsection

@section('content')
<div class="container">
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" class="form-control" name="title" id="Title" aria-describedby="emailHelp" value="{{old("title") ? old("title") : $post->title }}"
            placeholder="Inserisci il titolo">
        </div>
        <div class="form-group">
          <label for="Content">Content</label>
          <textarea class="form-control" name="content" id="Content" placeholder="Contenuto">{{old("content") ? old("content") : $post->content }}</textarea>
        </div>
        <div class="form-group">
          <label for="Author">Author</label>
            <select class="form-control" name="user_id" id="Author" >
                @php
                    $selected = old("user_id") ? old("user_id") : $post->user_id;
                @endphp
                @foreach ($users as $user)
                    <option value="{{$user->id }}" {{$selected == $user->id ? 'selected' : '' }} > {{ $user->name }} </option>
                @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="published">Pubblicato</label>
            @php
                $checked = old("published") !== null ? old("published") : $post->published;
            @endphp
                <input style="width:auto" type="checkbox" class="form-control" id="published" name="published" value="1" {{$checked == 1 ? "checked" : "" }}>                                 
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

</div>
@endsection