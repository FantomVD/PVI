@extends('shared._layout')

@section('content')
{{--pathBase--}}
    <div class="row flex-column align-items-center mb-5">
    <h2>Панель адміна</h2>
    <a class="btn btn-outline-info" href="/panel/edit">
        Створити новий пост
    </a>
</div>
<div class="container">

    <div class="row">
        @foreach($posts ?? [] as $post)

            <div class="col-2 p-2 ">
                    <a class="panel-img" href="/panel/edit?id={{$post->id}}">
                        <img src="{{url("storage/$post->image")}}" alt="">
                    </a>
                    <h3 class="small-title">{{$post->title}}</h3>
                    <a class="edit btn btn-secondary" href="/panel/edit?id={{$post->id}}">
                        Edit
                    </a>
                    <a class="edit btn btn-danger" href="/panel/remove?id={{$post->id}}">
                        Remove
                    </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
