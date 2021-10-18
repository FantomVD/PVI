<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="{{url('')}}">FinalBlog</a>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">

                <ul class="navbar-nav flex-grow-1 align-content-center d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('')}}">Головна</a>
                    </li>


                    @if (auth()->check())
                        @if (auth()->user()->isAdmin)
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('panel/edit')}}">Зробити пост</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark"  href="{{url('panel')}}">Адмін-панель</a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('logout')}}">Вийти</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{url('login')}}">Ввійти</a>
                            </li>

                        @endif
                    <li class="nav-item">
                        <form action="{{url('')}}" method="get">
                            <input type="hidden" name="pageNumber" value="{{$page ?? ''}}"/>
                            <input class="search" type="text" name="search" placeholder="Пошук статті"/>
                            <button class="submit-btn">Пошук</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
