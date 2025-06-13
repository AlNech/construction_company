@extends('admin.layouts.app')
@section('title', 'Просмотр заявки')
@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Просмотр заявки #{{ $application->id }}</h1>
            <a href="{{ route('admin.applications.index') }}"
               class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800 transition duration-200">
                Назад
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Имя</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->name }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Телефон</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->phone }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->email }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Статус</h3>
                        <p class="mt-1">
                            @if($application->is_processed)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Обработано</span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Новая</span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Дата создания</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $application->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-500">Сообщение</h3>
                    <div class="mt-1 p-4 bg-gray-50 rounded-md">
                        <p class="text-sm text-gray-700">{{ $application->message }}</p>
                    </div>
                </div>

                @if(!$application->is_processed)
                    <div class="mt-6 flex justify-end">
                        <form action="{{ route('applications.markAsProcessed', $application) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white transition duration-200 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                                Отметить как обработанную
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
