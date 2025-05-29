<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ Vite::asset('resources/images/favicon.svg') }}" type="image/x-icon">  
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
    <title>@yield('title') | Строительная компания "ПроектСтрой"</title>
    <!-- Общие CSS -->
</head>
<body>
    @include('partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
</body>
</html>
