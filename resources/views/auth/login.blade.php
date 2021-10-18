@extends('shared._layout')

@section('content')
<form class="sign-in-form" action="/login" method="post">
    <div>
        <label>
            Email
            <input name="email" />
        </label>
    </div>
    <div>
        <label>
            Пароль
            <input name="password" type="password" />
        </label>
    </div>
    <div>
        <input type="submit" value="Ввійти" />
        <a href="/register">Зареєструватись</a>
    </div>
</form>
@endsection
