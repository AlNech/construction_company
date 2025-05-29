@extends('admin.layouts.app')
@section('title', $portfolio->title)

@section('content')
    <div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">{{ $portfolio->title }}</h1>
        <a href="{{ route('admin.portfolio.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
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
                            <p class="text-sm text-gray-500">Услуга:</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $portfolio->service->title ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Дата проекта:</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $portfolio->project_date->format('d.m.Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Клиент:</p>
                            <p class="mt-1 text-sm text-gray-900">{{ $portfolio->client ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Статус:</p>
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $portfolio->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $portfolio->is_active ? 'Активна' : 'Неактивна' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Изображения</h2>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(json_decode($portfolio->images) as $image)
                            <img src="{{ $image }}" alt="Изображение проекта" class="w-full h-auto rounded-lg shadow">
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-medium text-gray-900 mb-2">Краткое описание</h2>
                <p class="text-gray-700">{{ $portfolio->short_description }}</p>
            </div>

            <div class="mt-6">
                <h2 class="text-lg font-medium text-gray-900 mb-2">Полное описание</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($portfolio->description)) !!}
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Редактировать
                </a>
            </div>
        </div>
    </div>
</div>
@endsection