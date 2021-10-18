@extends('shared._layout')


@section('content')
<div class="main-img">
    <span class="title">FinalBlog</span>

</div>

<div class="container">
    @include('shared._BlogPagination')

    <div class="row">
    @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-11 post">
            <a class="post-content" href='{{url("home/post?id=$post->id")}}'>
                <img src="{{url("storage/$post->image")}}" alt="">
                <span class="title">
                    {{$post->title}}
                </span>
            </a>
        </div>
    @endforeach
    </div>

</div>
@endsection
