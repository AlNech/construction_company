@extends('layouts.app')
@section('styles')
    @vite(['resources/css/services.css'])
@endsection

@section('title', 'Услуги')

@section('content')
    <section class="services-block">
        <div class="container">
            <h1>Наши услуги</h1>
            <p>Комплексные решения для строительства и благоустройства от профессионалов с 15-летним опытом</p>
        </div>
    </section>

    <!-- Блок услуг -->
    <section class="services-section">
        <div class="container">
            <h2>Что мы предлагаем</h2>
            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                <div class="service-card">
                    <div class="service-image">
                        <img src="<?= htmlspecialchars($service['image']) ?>"
                             alt="<?= htmlspecialchars($service['title']) ?>"
                             loading="lazy">
                        <div class="service-icon">
                            <i class="fas <?= htmlspecialchars($service['icon']) ?>"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3><?= htmlspecialchars($service['title']) ?></h3>
                        <p><?= htmlspecialchars($service['short_description']) ?></p>
                        <button class="btn details-btn"
                                data-title="{{ $service['title'] }}"
                                data-image="{{ $service['image'] }}"
                                data-description="{{ $service['description'] }}">
                            Подробнее <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
    </section>

    <!-- Модальное окно -->
    <div class="modal-overlay" id="serviceModal">
        <div class="modal-container">
            <button class="modal-close" id="modalClose">&times;</button>
            <h2 id="modalTitle"></h2>
            <img src="" alt="" class="service-modal-image" id="modalImage">
            <div class="modal-content" id="modalContent"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Получаем все кнопки "Подробнее"
            const detailButtons = document.querySelectorAll('.details-btn');
            const modal = document.getElementById('serviceModal');
            const modalClose = document.getElementById('modalClose');

            // Обработчик для кнопок "Подробнее"
            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Заполняем модальное окно данными
                    document.getElementById('modalTitle').textContent = this.dataset.title;
                    document.getElementById('modalImage').src = this.dataset.image;
                    document.getElementById('modalImage').alt = this.dataset.title;
                    document.getElementById('modalContent').innerHTML = this.dataset.description;

                    // Показываем модальное окно
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });

            // Закрытие модального окна
            modalClose.addEventListener('click', function () {
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



