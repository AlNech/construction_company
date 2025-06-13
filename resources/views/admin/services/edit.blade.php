@extends('admin.layouts.app')

@section('title', 'Редактирование услуги')
@section('header', 'Редактировать услугу: ' . $service->title)

@section('content')
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="p-6">
                @include('admin.services.form', ['service' => $service])
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                <a href="{{ route('admin.services.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Отмена
                </a>
                <button type="submit"
                        class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Обновить
                </button>
            </div>
        </form>
    </div>
@endsection
