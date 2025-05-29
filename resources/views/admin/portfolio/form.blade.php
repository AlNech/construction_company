@props(['portfolio' => null, 'services' => []])

<div class="space-y-6">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Название -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Название проекта *</label>
            <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title ?? '') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- URL (slug) -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">URL (slug) *</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug', $portfolio->slug ?? '') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('slug')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Услуга -->
    <div>
        <label for="service_id" class="block text-sm font-medium text-gray-700">Услуга *</label>
        <select name="service_id" id="service_id" required
                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="">-- Выберите услугу --</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}" {{ old('service_id', $portfolio->service_id ?? '') == $service->id ? 'selected' : '' }}>
                    {{ $service->title }}
                </option>
            @endforeach
        </select>
        @error('service_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Краткое описание -->
    <div>
        <label for="short_description" class="block text-sm font-medium text-gray-700">Краткое описание</label>
        <textarea name="short_description" id="short_description" rows="2"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('short_description', $portfolio->short_description ?? '') }}</textarea>
        @error('short_description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Полное описание -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Полное описание *</label>
        <textarea name="description" id="description" rows="5" required
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $portfolio->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Изображения -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Ссылки на изображения</label>
    
        @if(isset($portfolio) && $portfolio->images)
            <div class="mt-2 grid grid-cols-3 gap-4">
                @foreach(json_decode($portfolio->images) as $image)
                    <div class="relative group">
                        <img src="{{ $image }}" class="h-32 w-full object-cover rounded">
                        <button type="button" 
                                class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100"
                                onclick="removeImage(this, '{{ $image }}')">
                            ×
                        </button>
                    </div>
                @endforeach
            </div>
        @endif

        <div id="imageUrlsContainer" class="mt-2 space-y-2">
            <!-- Здесь будут добавляться поля для URL -->
        </div>

        <button type="button" 
                onclick="addImageUrlField()"
                class="mt-2 inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Добавить изображение
        </button>

        <!-- Скрытое поле для хранения удаляемых изображений -->
        <input type="hidden" name="removed_images" id="removedImages" value="">

        @error('images')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <!-- Дата проекта -->
        <div>
            <label for="project_date" class="block text-sm font-medium text-gray-700">Дата проекта *</label>
            <input type="date" name="project_date" id="project_date" value="{{ old('project_date', isset($portfolio) ? $portfolio->project_date->format('Y-m-d') : '') }}" required
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('project_date')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Клиент -->
        <div>
            <label for="client" class="block text-sm font-medium text-gray-700">Клиент</label>
            <input type="text" name="client" id="client" value="{{ old('client', $portfolio->client ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('client')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Порядок сортировки -->
        <div>
            <label for="sort_order" class="block text-sm font-medium text-gray-700">Порядок сортировки</label>
            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('sort_order')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Статус -->
    <div>
        <label for="is_active" class="block text-sm font-medium text-gray-700">Статус</label>
        <select name="is_active" id="is_active" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option value="1" {{ old('is_active', isset($portfolio) ? $portfolio->is_active : true) ? 'selected' : '' }}>Активен</option>
            <option value="0" {{ !old('is_active', isset($portfolio) ? $portfolio->is_active : true) ? 'selected' : '' }}>Неактивен</option>
        </select>
    </div>
</div>

<script>
    // Добавляем новое поле для URL изображения
    function addImageUrlField(value = '') {
        const container = document.getElementById('imageUrlsContainer');
        const div = document.createElement('div');
        div.className = 'flex items-center';
        div.innerHTML = `
            <input type="url" name="images[]" value="${value}" 
                   class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                   placeholder="https://example.com/image.jpg">
            <button type="button" 
                    class="ml-2 text-red-500 hover:text-red-700"
                    onclick="this.parentElement.remove()">
                Удалить
            </button>
        `;
        container.appendChild(div);
    }

    // Удаление существующего изображения
    function removeImage(button, imageUrl) {
        const removedImages = document.getElementById('removedImages');
        const currentValue = removedImages.value ? JSON.parse(removedImages.value) : [];
        currentValue.push(imageUrl);
        removedImages.value = JSON.stringify(currentValue);
        
        // Удаляем элемент из DOM
        button.closest('div.relative').remove();
    }

    // Добавляем поля для существующих изображений при редактировании
    @if(isset($portfolio) && $portfolio->images && request()->isMethod('get'))
        @foreach(json_decode($portfolio->images) as $image)
            addImageUrlField('{{ $image }}');
        @endforeach
    @endif
</script>
