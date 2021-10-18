@extends('shared._layout')

@section('content')
<form class="sign-in-form" action="/register" method="post">
    <div>
        <label> Нік
            <input name="name"/>
        </label>
    </div>
    <div>
        <label> Email
            <input name="email" type="email"/>
        </label>
    </div>
    <div>
        <label>
            Пароль
            <input name="password" type="password" />
        </label>
    </div>
    <div>
        <input type="submit" value="Зареєструватись" />
    </div>
</form>
@endsection
