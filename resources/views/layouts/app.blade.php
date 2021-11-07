<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posty</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="#" class="p-3">Ana Sayfa</a>
            </li>
            <li>
                <a href="#" class="p-3">Profil</a>
            </li>
            <li>
                <a href="#" class="p-3">Gönderi</a>
            </li>
        </ul>
        <ul class="flex items-center">
            <li>
                <a href="#" class="p-3">Erdi</a>
            </li>
            <li>
                <a href="#" class="p-3">Giriş</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Kayıt</a>
            </li>
            <li>
                <a href="#" class="p-3">Çıkış</a>
            </li>
        </ul>
    </nav>


    @yield('content')
</body>
</html>