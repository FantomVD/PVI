@extends('shared._layout')


@section('content')
<div class="main-img">
    <span class="title">FinalBlog</span>

</div>

<div class="container mb-5">
    <div class="mt-4 row justify-content-center">
        <form action="{{url('')}}" method="get">
            <input type="hidden" name="page" value="{{$page ?? ''}}"/>
            <input class="search" type="text" name="search" value="{{$search ?? ''}}" placeholder="Пошук статті"/>
            <button class="submit-btn">Пошук</button>
            <select name="category_id" id="">
                <option value="0"
                @if($category_id==0)
                    selected
                @endif
                >Усі</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"}}
                            @if($category_id == $category->id)
                            selected
                        @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </form>


    </div>

    <div class="pages">
        @if ($page > 1)
            <a href="{{url("?page=$previousPage&search=$search&category_id=$category_id")}}">&lt;</a>
        @endif

        <a class="active" href="{{url("?page=$page&search=$search&category_id=$category_id")}}">{{$page}}</a>

        @if ($last>=$nextPage)
            <a href="{{url("?page=$nextPage&search=$search&category_id=$category_id   ")}}">&gt;</a>
        @endif
    </div>

    <div class="row">
    @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-11 post">
            <a class="post-content" href='{{url("home/post?id=$post->id")}}'>
                <img src="{{url("storage/$post->image")}}" alt="">
                <p class="title">
                    {{$post->title}}
                    <br>
                </p>
            </a>
                <p style="position:relative;">
                    Post by: {{$post->user->name}}
                </p>
        </div>
    @endforeach
{{--        {!! $posts->render() !!}--}}
    </div>

</div>
@endsection
