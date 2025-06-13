@extends('admin.layouts.app')

@section('title', 'Панель управления')
@section('header', 'Главная')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Статистика по услугам -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-concierge-bell text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm font-medium">Услуги</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['services'] }}</p>
                </div>
            </div>
        </div>

        <!-- Статистика по проектам -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-images text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm font-medium">Проекты</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['projects'] }}</p>
                </div>
            </div>
        </div>

        <!-- Статистика по новостям -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-newspaper text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm font-medium">Новости</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['news'] }}</p>
                </div>
            </div>
        </div>

        <!-- Статистика по заявкам -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-envelope text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm font-medium">Новые заявки</h3>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['applications'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Последние заявки -->
    <div class="bg-white shadow rounded-lg overflow-hidden mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Последние заявки</h3>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($recentApplications as $application)
                <div class="px-6 py-4 hover:bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-indigo-600">{{ $application->name }}</p>
                            <p class="text-sm text-gray-500">{{ $application->phone }}</p>
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $application->created_at->format('d.m.Y H:i') }}
                        </div>
                    </div>
                    @if($application->message)
                        <div class="mt-2 text-sm text-gray-500">
                            {{ Str::limit($application->message, 100) }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="px-6 py-4 border-t border-gray-200">
            <a href="{{ route('admin.applications.index') }}"
               class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                Просмотреть все заявки
            </a>
        </div>
    </div>

    <!-- Быстрые действия -->

@endsection
