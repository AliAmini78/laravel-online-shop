<!DOCTYPE html>
<html lang="fa">
<head>
    <title>My Web Application</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body >
<header >
    @include("Common::layouts.panel.header")
</header>

<div class="container">
    @yield('content')
</div>

</body>
</html>
