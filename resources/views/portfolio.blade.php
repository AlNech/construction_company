@extends('layouts.app')
@section('styles')
    @vite(['resources/css/portfolio.css'])
@endsection
@section('title', 'Портфолио')

@section('content')
    <section class="portfolio-block">
        <div class="container">
            <h1>Наши работы</h1>
            <p>Реализованные проекты, которыми мы гордимся. Более 200 успешных объектов по всей России.</p>
        </div>
    </section>

    <!-- Блок портфолио -->
    <section class="portfolio-section">
        <div class="container">
            <div class="portfolio-filter">
                <button class="filter-btn active" data-filter="all">Все работы</button>
                @foreach($services as $service)
                    <button class="filter-btn" data-filter="service-{{ $service->id }}">{{ $service->title }}</button>
                @endforeach
            </div>

            <div class="portfolio-grid" id="portfolio-grid">
                @foreach($portfolio as $item)
                    @if($item->is_active)
                        <div class="portfolio-item" data-category="service-{{ $item->service_id }}">
                            <div class="portfolio-image">
                                <img src="{{ $item->images[0] }}" alt="{{ $item->title }}" loading="lazy">
                            </div>
                            <div class="portfolio-content">
                                <h3>{{ $item->title }}</h3>
                                <p>{{ $item->short_description }}</p>
                                <span class="portfolio-category">{{ $service->title }}</span>
                                <button class="btn  btn-details"
                                        data-slug="{{ $item->slug }}"
                                        data-title="{{ $item->title }}"
                                        data-description="{{ $item->description }}"
                                        data-images="{{ json_encode($item->images) }}"
                                        data-date="{{ $item->project_date->format('d.m.Y') }}"
                                        data-client="{{ $item->client }}">
                                    Подробнее <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>

    </section>



    <!-- Модальное окно -->
    <div class="portfolio-modal" id="portfolioModal">
        <button class="modal-close" id="modalClose">&times;</button>
        <div class="modal-content-container">
            <div class="portfolio-slider" id="mainSlider">
                <!-- Основные изображения будут здесь -->
            </div>
            <div class="slider-nav" id="sliderNav">
                <!-- Навигация слайдера будет здесь -->
                <div class="slider-arrows">
                    <button class="slider-arrow prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-arrow next"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="portfolio-info">
                <h2 id="modalTitle"></h2>
                <div class="portfolio-meta">
                    <p><strong>Дата проекта:</strong> <span id="projectDate"></span></p>
                    <p><strong>Клиент:</strong> <span id="projectClient"></span></p>
                </div>
                <div class="portfolio-description" id="projectDescription"></div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('portfolioModal');
            const closeBtn = document.getElementById('modalClose');
            const detailButtons = document.querySelectorAll('.btn-details');

            // Обработчик для кнопок "Подробнее"
            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Заполняем заголовок и текст
                    document.getElementById('modalTitle').textContent = this.dataset.title;
                    document.getElementById('projectDate').textContent = this.dataset.date;
                    document.getElementById('projectClient').textContent = this.dataset.client;
                    document.getElementById('projectDescription').textContent = this.dataset.description;

                    // Очищаем слайдер
                    const mainSlider = document.getElementById('mainSlider');
                    const sliderNav = document.getElementById('sliderNav');
                    mainSlider.innerHTML = '';
                    sliderNav.innerHTML = '';

                    // Добавляем изображения
                    const images = JSON.parse(this.dataset.images);
                    images.forEach((image, index) => {
                        // Основное изображение
                        const mainImg = document.createElement('img');
                        mainImg.src = image;
                        mainImg.alt = this.dataset.title;
                        mainImg.dataset.index = index;
                        if (index === 0) mainImg.classList.add('active');
                        mainSlider.appendChild(mainImg);

                        // Миниатюра для навигации
                        const navItem = document.createElement('div');
                        navItem.classList.add('slider-nav-item');
                        if (index === 0) navItem.classList.add('active');
                        navItem.dataset.index = index;

                        const navImg = document.createElement('img');
                        navImg.src = image;
                        navImg.alt = 'Миниатюра ' + (index + 1);
                        navItem.appendChild(navImg);

                        navItem.addEventListener('click', function () {
                            // Удаляем активные классы
                            document.querySelectorAll('#mainSlider img').forEach(img => {
                                img.classList.remove('active');
                            });
                            document.querySelectorAll('.slider-nav-item').forEach(item => {
                                item.classList.remove('active');
                            });

                            // Добавляем активные классы
                            mainSlider.querySelector(`img[data-index="${this.dataset.index}"]`).classList.add('active');
                            this.classList.add('active');
                        });

                        sliderNav.appendChild(navItem);
                    });

                    // Показываем модальное окно
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });

            // Закрытие модального окна
            closeBtn.addEventListener('click', function () {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });

            // Закрытие при клике вне модального окна
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>
@endsection
