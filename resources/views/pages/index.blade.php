@extends('layouts.app')
@section('content')
    <h1>Welcome to my Blogs Application</h1>
    <h3>Blogs</h3>
    @if(count($blogs)>0)
        <div >
            @foreach($blogs as $blog)
                <div class="card well" style="width:100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$blog->created_at}} by {{$blog->user->name}}</h6>
                        <p class="card-text">{{substr($blog->content, 0, 200)}}...</p>
                        <a href="/blogs/{{$blog->id}}" class="card-link">View Blog</a>
                    </div>
                </div>
{{--                <li class="list-group-item">{{$blog->title}}</li>--}}
            @endforeach
        </div>
    @endif
@endsection
