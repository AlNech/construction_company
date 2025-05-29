<!DOCTYPE html>
<html lang="ru" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ Vite::asset('resources/images/favicon.svg') }}" type="image/x-icon">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/admin/css/app.css'])
</head>
<body class="h-full">
    <div class="min-h-full">
        <!-- Mobile menu -->
        <div class="bg-indigo-600 pb-32">
            <div class="py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-white text-2xl font-bold">Админ-панель</span>
                        </div>
                    </div>
                    <div class="md:hidden">
                        <button type="button" class="text-white hover:text-indigo-200 focus:outline-none" id="mobile-menu-button">
                            <i class="fas fa-bars text-2xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Desktop sidebar -->
                    <div class="hidden md:block md:w-64 flex-shrink-0">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <nav class="space-y-1 p-4">
                                <!-- Dashboard -->
                                <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <i class="fas fa-tachometer-alt mr-3 text-indigo-400 group-hover:text-indigo-500"></i>
                                    <span class="truncate">Панель управления</span>
                                </a>

                                <!-- Услуги -->
                                <a href="{{ route('admin.services.index') }}" class="@if(request()->routeIs('admin.services.*')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <i class="fas fa-concierge-bell mr-3 text-indigo-400 group-hover:text-indigo-500"></i>
                                    <span class="truncate">Услуги</span>
                                </a>

                                <!-- Портфолио -->
                                <a href="{{ route('admin.portfolio.index') }}" class="@if(request()->routeIs('admin.portfolio.*')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <i class="fas fa-images mr-3 text-indigo-400 group-hover:text-indigo-500"></i>
                                    <span class="truncate">Портфолио</span>
                                </a>

                                <!-- Новости -->
                                <a href="{{ route('admin.news.index') }}" class="@if(request()->routeIs('admin.news.*')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <i class="fas fa-newspaper mr-3 text-indigo-400 group-hover:text-indigo-500"></i>
                                    <span class="truncate">Новости</span>
                                </a>

                                <!-- Заявки -->
                                <a href="{{ route('admin.applications.index') }}" class="@if(request()->routeIs('admin.applications.*')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                                    <i class="fas fa-envelope mr-3 text-indigo-400 group-hover:text-indigo-500"></i>
                                    <span class="truncate">Заявки</span>
                                </a>
                            </nav>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="flex-1" style="max-width:900px">
                        <div class="bg-white rounded-lg shadow overflow-hidden">
                            <div class="p-6">
                                <h1 class="text-2xl font-bold text-gray-900 mb-6">@yield('header')</h1>
                                
                                @if(session('success'))
                                    <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div class="hidden fixed inset-0 z-10 bg-gray-900 bg-opacity-50" id="mobile-menu">
        <div class="fixed inset-0 flex z-40">
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" id="mobile-menu-close">
                        <span class="sr-only">Закрыть меню</span>
                        <i class="fas fa-times text-white text-xl"></i>
                    </button>
                </div>
                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <span class="text-indigo-600 text-xl font-bold">Админ-панель</span>
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <!-- Те же ссылки, что и в desktop меню -->
                        <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) bg-indigo-50 text-indigo-700 @else text-gray-600 hover:bg-gray-50 @endif group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <i class="fas fa-tachometer-alt mr-4 text-indigo-400 group-hover:text-indigo-500"></i>
                            Панель управления
                        </a>
                        <!-- Остальные пункты меню -->
                    </nav>
                </div>
            </div>
            <div class="flex-shrink-0 w-14"></div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.remove('hidden');
        });

        document.getElementById('mobile-menu-close').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    </script>
</body>
</html>