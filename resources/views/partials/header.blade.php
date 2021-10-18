<header>
    <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" asp-area="" asp-controller="Home" asp-action="Index">FinalBlog</a>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">

                <ul class="navbar-nav flex-grow-1 align-content-center d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark" asp-area="" asp-controller="Home" asp-action="Index">Головна</a>
                    </li>


{{--                    @if (User.Identity.IsAuthenticated)--}}
{{--                        {--}}
{{--                        @if (User.IsInRole("Admin"))--}}
{{--                            {--}}
                            <li class="nav-item">
                                <a class="nav-link text-dark" asp-area="" asp-controller="Panel" asp-action="Edit">Зробити пост</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" asp-area="" asp-controller="Panel" asp-action="Index">Адмін-панель</a>
                            </li>
{{--                            }--}}
                            <li class="nav-item">
                                <a class="nav-link text-dark" asp-area="" asp-controller="Auth" asp-action="Logout">Вийти</a>
                            </li>
{{--                            }--}}
{{--                            else--}}
{{--                            {--}}
                            <li class="nav-item">
                                <a class="nav-link text-dark" asp-area="" asp-controller="Auth" asp-action="Login">Ввійти</a>
                            </li>
{{--                            }--}}
{{--                            <li class="nav-item">--}}
{{--                                @RenderSection("Search", false)--}}
{{--                            </li>--}}
                </ul>
            </div>
        </div>
    </nav>
</header>
