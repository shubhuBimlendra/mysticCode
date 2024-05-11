@extends('admin.layout.master')

@section('content')

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Post</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
</div>
</div>
</div>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-xs-12 col-sm-9">
    <div class="form-group">
    <strong>Title:</strong>
    <input type="text" name="title" class="form-control" placeholder="Title">
    @error('title')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
    <strong>Content:</strong>
    <input type="text" name="content" class="form-control" placeholder="Content">
    @error('content')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <strong>Category</strong>
            <select class="form-control" name="category_id">
                <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        @error('category_id')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>


    </div>
    </div>
    <button type="submit" class="btn btn-primary ml-3">Submit</button>
</form>

@endsection
