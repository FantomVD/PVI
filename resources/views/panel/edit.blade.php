@extends('shared._layout')

@section('styles')
    <link href="/lib/Trumbowyg-master/dist/ui/trumbowyg.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="mb-2">
    <form action="/panel/edit" method="post" enctype="multipart/form-data">

        @isset($post)
            <input name="id" value="{{$post->id}}" type="hidden" />
            <div>
                <label>Заголовок</label>
                <input name="title" value="{{$post->title}}" />
            </div>
            <div>
                <label for="category">Категорія</label>
                <select name="category_id" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"}}
                            @if($post->category_id == $category->id)
                                selected
                            @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Текст</label>
                <textarea id="editor" name="body">{{$post->body}}</textarea>
            </div>
            <div>
                <label>Картинка</label>
                <input name="current_image" value="{{url("storage/$post->image")}}" type="hidden" />
                <input name="image" type="file" />
            </div>
            <input type="submit" value="Зберегти" />
            @else
                <div>
                    <label>Заголовок</label>
                    <input name="title"/>
                </div>
                 <div>
                     <label for="category">Категорія</label>
                     <select name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Текст</label>
                    <textarea id="editor" name="body"></textarea>
                </div>
                <div>
                    <label>Картинка</label>
                    <input name="image" type="file" />
                </div>
                <input type="submit" value="Зберегти" />
        @endif
    </form>
</div>
@endsection

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/lib/Trumbowyg-master/dist/trumbowyg.min.js"></script>
    <script>
        $('#editor').trumbowyg();

    </script>
@endsection
