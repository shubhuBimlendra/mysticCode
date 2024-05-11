@extends('admin.layout.master')

@section('content')

<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Category</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
</div>
</div>
</div>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
    <div class="col-xs-12 col-sm-9">
    <div class="form-group">
    <strong>Category Name:</strong>
    <input type="text" name="name" class="form-control" placeholder="Category Name">
    @error('name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary ml-3">Submit</button>
</form>

@endsection
