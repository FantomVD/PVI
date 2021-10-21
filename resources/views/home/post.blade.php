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
                    <div class="title">
                        <span>{{$post->title}}</span>
                    </div>
            </div>
            <i style="border: solid 1px black">Написав: {{$post->user->name}}</i>

            <div class="post-body">
                {!! $post->body !!}
            </div>
            @auth
                <div class="comment-section mt-5 mb-5">
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <button  style="font-size: 20pt" class="btn p-0" id="like" onclick="like()">
                            @if($like)
                                &#9829;
                            @else
                                &#9825;
                            @endif
                        </button>
                        <strong id="total_likes"  style="font-size: 20pt"> - Total likes: {{$total_likes}}</strong>

                    </div>
                    <i>Створений: {{$post->created_at}}</i>
                    </div>

                    <br>



                    <div class="mb-3">
                        <form method="post" action="/comment">
                            <input name="post_id" value="{{$post['id']}}" type="hidden" />
                            <input name="user_id" value="{{auth()->user()->id}}" type="hidden"/>
                            <input name="message" />
                            <button class="btn-info" type="submit">Коментувати</button>
                        </form>
                    </div>

                </div>
            @else
                <div>
                    <a href="{{url('login')}}">Ввійдіть</a> щоб мати можливість коментувати пост!
                </div>
            @endauth
        <strong>Коментарі</strong>
        @foreach ($comments as $comment)
                @if(!$admin)
                    <p class="comment mt-2 p-2">
                        {{$comment->message}} - {{$comment->user->name}} --- {{$comment->created_at}}
                    </p>
                @else
                    <div id="div-{{$comment->id}}" class="d-flex mt-2 justify-content-between">
                        <div>
                            Автор: {{$comment->user->name}} --- <input id="comment-text-{{$comment->id}}" type="text" value="{{$comment->message}}">
                        </div>
                        <div>
                            <button class="btn btn-info" onclick="update({{$comment->id}})">Оновити</button>
                            <button class="btn btn-danger" onclick="deleteComment({{$comment->id}})">Видалити</button>
                        </div>
                    </div>
                @endif

            @endforeach

        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        async function deleteComment(id) {
            const url = '{{url('comment')}}'
            await fetch(`${url}/${id}`, {
                method: "DELETE"
            })
            $(`#div-${id}`)[0].remove()
        }

        async function update(id) {
            const url = '{{url('comment')}}'
            const message = document.querySelector(`#comment-text-${id}`).value
            console.log(message)
            await fetch(`${url}/${id}`, {
                method: "PUT",
                body: JSON.stringify({comment_id: id, message})
            })
        }

        async function like(){
            const r = /\d+/;
            let total_likes_div = $('#total_likes')[0]
            let total_likes = total_likes_div.innerText.match(r)[0]

            if($('#like')[0].innerText.includes("♥")){
                $('#like')[0].innerText = '♡'
                $('#total_likes')[0].innerHTML = ` - Total likes: ${total_likes-1}`

            } else {
                $('#like')[0].innerText = '♥'
                $('#total_likes')[0].innerHTML = ` - Total likes: ${+total_likes + 1}`
            }
            //----
            const id = {{$post->id}};
            await fetch('{{url('like')}}',{
                method: "POST",
                body: JSON.stringify({post_id: id})
            })
        }

    </script>
@endsection
