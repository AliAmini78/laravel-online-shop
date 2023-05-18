<nav class="navbar navbar-expand-lg navbar-dark  bg-dark border-bottom ">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">آنلاین شاپ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('product.home_list')}}">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("cart.list")}}">سبد خرید</a>
                </li>
            </ul>

            @auth
                <div class="d-flex">
                    @if(auth()->user()->is_admin)
                        <a href="{{route('panel')}}" class="btn btn-success ms-2" type="submit">پنل</a>
                    @endif
                    <form method="POST"  action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">خروج</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="d-flex">
                    <a href="{{route('login')}}" class="btn btn-success ms-2" type="submit">ورود</a>
                    <a href="{{route('register')}}" class="btn btn-danger" type="submit">ثبت نام</a>
                </div>
            @endguest

        </div>
    </div>
</nav>
