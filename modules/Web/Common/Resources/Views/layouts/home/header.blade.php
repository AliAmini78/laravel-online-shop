<nav class="navbar navbar-expand-lg navbar-dark  bg-dark border-bottom " >
    <div class="container-fluid">
        <a class="navbar-brand" href="#">آنلاین شاپ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">سبد خرید</a>
                </li>
            </ul>

            @auth
                <div class="d-flex">
                    <a href="{{route('panel')}}" class="btn btn-success me-2" type="submit">پنل</a>
                    <a href="{{route('logout')}}"  class="btn btn-danger" type="submit">خروج</a>
                </div>
            @endauth
            @guest
                <div class="d-flex">
                    <a href="{{route('login')}}" class="btn btn-success me-2" type="submit">ورود</a>
                    <a href="{{route('register')}}"  class="btn btn-danger" type="submit">ثبت نام</a>
                </div>
            @endguest

        </div>
    </div>
</nav>
