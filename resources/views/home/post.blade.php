@extends('shared._layout')

<!-- { -->
<!--     var base_path = Context.Request.PathBase; -->
<!-- } -->

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-10">
            <div class="post no-shadow separate-post">
                    <img src="{{url("storage/$post->image")}}"/>
                    <span class="title">{{$post->title}}</span>
            </div>
            <div class="post-body">
                {!! $post->body !!}
            </div>
            @auth
                <div class="comment-section mt-5 mb-5">
                    <strong>Коментарі</strong>

                    <div>
                        <form method="post" action="/comment">
                            <input name="post_id" value="{{$post['id']}}" type="hidden" />
                            <input name="message" />
                            <button class="btn-info" type="submit">Коментувати</button>
                        </form>
                    </div>


                @foreach ($comments as $comment)
                    <p class="comment mt-2 p-2">
                        {{$comment->message}} --- {{$comment->created_at}}
                    </p>
                    @endforeach
                </div>
            @else
                <div>
                    <a href="{{url('login')}}">Ввійдіть</a> щоб мати можливість коментувати пост!
                </div>
            @endauth
        </div>
    </div>

</div>
@endsection
