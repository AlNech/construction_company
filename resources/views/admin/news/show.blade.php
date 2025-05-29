@extends('admin.layouts.app')

@section('title', $news->title)

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Просмотр новости: {{ $news->title }}</h1>
            <a href="{{ route('admin.news.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
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
                                <p class="text-sm text-gray-500">Заголовок:</p>
                                <p class="mt-1 text-sm text-gray-900">{{ $news->title }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Дата публикации:</p>
                                <p class="mt-1 text-sm text-gray-900">{{ $news->publish_date->format('d.m.Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Статус:</p>
                                <p class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $news->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $news->is_published ? 'Опубликовано' : 'Черновик' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Изображение</h2>
                        @if($news->image)
                            <img src="{{ Storage::url($news->image) }}" alt="Изображение новости" class="w-full h-auto rounded-lg shadow">
                        @else
                            <p class="text-sm text-gray-500">Нет изображения</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Краткое описание</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($news->excerpt)) !!}
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Содержание</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.news.edit', $news) }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection