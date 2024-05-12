@extends('admin.layout.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Posts</title>
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
<div><h4>Manage News</h4></div>

<div class="pull-right mb-2">
<a class="btn btn-success" href="{{route('news.create')}}"> Create News</a>
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
    <th>Title</th>
    <th>Content</th>
    <th>Category Name</th>
    <th>Action</th>
</tr>
@foreach($news as $newss)
     <tr>
        <td>{{$newss->id}}</td>
        <td>{{$newss->title}}</td>
        <td>{{$newss->content}}</td>
        <td>{{$newss->category->name}}</td>
        <td>
            <form action="{{ route('news.destroy',$newss->id) }}" method="Post">
                <a href="{{ route('news.edit',$newss->id) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="fa fa-times fa-2x text-danger"></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$news->links()}}
</body>
</html>

@endsection
