@extends('admin.layouts.app')
@section('title', 'Управление услугами')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Просмотр услуги: {{ $service->title }}</h1>
            <a href="{{ route('admin.services.index') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Назад к списку
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Информация</h2>
                        <div class="space-y-4">
                            <div>
                                <p class="text-sm text-gray-500">Название:</p>
                                <p class="mt-1 text-sm text-gray-900">{{ $service->title }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Порядок сортировки:</p>
                                <p class="mt-1 text-sm text-gray-900">{{ $service->sort_order }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Статус:</p>
                                <p class="mt-1">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $service->is_active ? 'Активна' : 'Неактивна' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Изображение</h2>
                        @if($service->image)
                            <img src="{{ $service->image  }}" alt="Изображение услуги"
                                 class="w-full h-auto rounded-lg shadow">
                        @else
                            <p class="text-sm text-gray-500">Нет изображения</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Краткое описание</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($service->short_description)) !!}
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Полное описание</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.services.edit', $service) }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
