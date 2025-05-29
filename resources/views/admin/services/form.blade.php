@props(['service' => null])

<div class="space-y-6">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Название -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Название услуги *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $service->title ?? '') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- URL (slug) -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">URL (slug) *</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug ?? '') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('slug')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Краткое описание -->
    <div>
        <label for="short_description" class="block text-sm font-medium text-gray-700">Краткое описание</label>
        <textarea name="short_description" id="short_description" rows="2"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('short_description', $service->short_description ?? '') }}</textarea>
        @error('short_description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Полное описание -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Полное описание *</label>
        <textarea name="description" id="description" rows="5" required
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $service->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Изображение -->
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Ссылка на изображение</label>
        @if(isset($service) && $service->image)
            <div class="mt-2">
                <img src="{{ $service->image }}" alt="{{ $service->title }}" class="h-32 w-32 object-cover rounded">
                <label class="inline-flex items-center mt-2">
                    <input type="checkbox" name="remove_image" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600">Удалить изображение</span>
                </label>
            </div>
        @endif

        <input type="url" name="image" id="image" value="{{ old('image', $service->image ?? '') }}" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
            placeholder="https://example.com/image.jpg">
    
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <!-- Порядок сортировки -->
        <div>
            <label for="sort_order" class="block text-sm font-medium text-gray-700">Порядок сортировки</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('sort_order')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Статус -->
        <div>
            <label for="is_active" class="block text-sm font-medium text-gray-700">Статус</label>
            <select name="is_active" id="is_active" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="1" {{ old('is_active', isset($service) ? $service->is_active : true) ? 'selected' : '' }}>Активна</option>
                <option value="0" {{ !old('is_active', isset($service) ? $service->is_active : true) ? 'selected' : '' }}>Неактивна</option>
            </select>
        </div>
    </div>
</div>