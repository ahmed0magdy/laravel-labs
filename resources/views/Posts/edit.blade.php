@extends('layout.header')

@section('title') update @endsection
@section('content')
<form action="{{route('posts.update',$post->id)}}" method="POST">

  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1"
      aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input name="description" value="{{$post->description}}" type="text" class="form-control" id="exampleInputEmail1"
      aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{ $user->name }}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection