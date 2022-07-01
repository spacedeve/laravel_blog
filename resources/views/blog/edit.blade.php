@extends('layouts.app')
@section('title', 'Blog')
@section('content')
  <div class="w-50 mx-auto" style="padding: 150px 0 100px 0;">
    <form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data"
          style="border: 1px solid #fff; padding: 30px; box-shadow: rgba(100, 100, 111, 0.4) 0px 7px 29px 0px; border-radius: 15px;">
      @csrf
      @method('patch')
      <div class=" form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$blog->title}}">
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" placeholder="Content" name="content">{{$blog->content}}</textarea>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
                 aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <input type="submit" class="btn btn-primary">
    </form>
  </div>
@endsection