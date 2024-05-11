@extends('admin.layout.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Categories</title>
<style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
        .sclist{
            list-style:none;
        }
        .sclist li{
            line-height: 33px;
            border-bottom: 1px solid #ccc;
        }
        .slink i{
            font-size:17px;
            margin-left: 13px;
        }
    </style>
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div><h4>Manage Category</h4></div>

<div class="pull-right mb-2">
<a class="btn btn-success" href="{{route('categories.create')}}"> Create Category</a>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-primary" role="alert">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Action</th>
</tr>
@foreach($categories as $category)
     <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
            <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                <a href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="fa fa-times fa-2x text-danger"></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$categories->links()}}
</body>
</html>

@endsection
