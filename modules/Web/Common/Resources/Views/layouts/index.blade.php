<!DOCTYPE html>
<html lang="fa">
<head>
    <title>My Web Application</title>
</head>
<body>
<header>
    @include("Common::layouts/header")
</header>
<div class="container">
    @yield('content')
</div>
<footer>
    @include("Common::layouts/footer")
</footer>
</body>
</html>
