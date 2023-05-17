<nav class="navbar navbar-expand-lg navbar-dark  bg-dark border-bottom " >
    <div class="container-fluid">
        <a class="navbar-brand" href="#"> پنل ادمین</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('panel')}}">پنل</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link active" aria-current="page" >صفحه محصولات</a>
                </li>
            </ul>

                <div class="d-flex">
                    <a href="{{route('home')}}" class="btn btn-success ms-2" type="submit">خانه</a>
                    <a href="{{route('logout')}}"  class="btn btn-danger " type="submit">خروج</a>
                </div>
        </div>
    </div>
</nav>
