@extends('layouts.app')
@section('styles')
    @vite(['resources/css/about.css'])
@endsection
@section('title', 'О компании')

@section('content')
    <section class="block-about">
        <div class="container">
            <h1>О нашей компании</h1>
            <p>15 лет опыта в строительстве и реконструкции зданий любого уровня сложности</p>
        </div>
    </section>

    <!-- Achievements -->
    <section class="section achievements">
        <div class="container">
            <div class="section-title">
                <h2>Наши достижения</h2>
            </div>
            <div class="achievements-grid">
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="achievement-number">15+</div>
                    <div class="achievement-text">Лет на рынке строительных услуг</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="achievement-number">200+</div>
                    <div class="achievement-text">Успешно реализованных проектов</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="achievement-number">50+</div>
                    <div class="achievement-text">Квалифицированных специалистов</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="achievement-number">10</div>
                    <div class="achievement-text">Лет гарантии на выполненные работы</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Company -->
    <section class="section">
        <div class="container">
            <div class="about-company">
                <div class="about-content">
                    <h2>Строительная компания "ПроектСтрой"</h2>
                    <p>Основанная в 2008 году, наша компания зарекомендовала себя как надежный партнер в сфере строительства и реконструкции. Мы специализируемся на создании качественного и комфортного жилья, отвечающего самым высоким стандартам.</p>
                    <p>Наша команда состоит из опытных профессионалов - архитекторов, инженеров и строителей, которые работают слаженно и ответственно. Мы используем только проверенные материалы и современные технологии, что позволяет нам гарантировать долговечность и надежность наших объектов.</p>
                    <p>Основные принципы нашей работы - это прозрачность, индивидуальный подход к каждому клиенту и строгое соблюдение сроков. Мы ценим доверие наших заказчиков и делаем все возможное, чтобы его оправдать.</p>
                </div>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="О компании">
                </div>
            </div>
        </div>
    </section>

    <!-- Work Steps -->
    <section class="section work-steps">
        <div class="container">
            <div class="section-title">
                <h2>Как мы работаем</h2>
            </div>
            <div class="steps-container">
                <div class="steps-line"></div>
                
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Консультация</h3>
                        <p>Наш специалист выезжает на объект, проводит замеры и обсуждает с вами все детали будущего проекта. Мы внимательно выслушиваем ваши пожелания и предлагаем оптимальные решения.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Проектирование</h3>
                        <p>Наши архитекторы и инженеры разрабатывают детальный проект, который включает все технические решения, 3D-визуализацию и точную смету. Вы вносите правки, пока проект не будет полностью соответствовать вашим ожиданиям.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Договор</h3>
                        <p>Мы заключаем договор, в котором фиксируем сроки, стоимость и этапы работ. Все условия прозрачны и понятны, никаких скрытых платежей или неожиданных доплат.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Реализация</h3>
                        <p>Наши строители приступают к работе. Каждый этап контролируется прорабом и техническим надзором. Вы получаете регулярные фотоотчеты и можете в любой момент посетить объект.</p>
                    </div>
                </div>
                
                <div class="step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Сдача объекта</h3>
                        <p>После завершения всех работ мы вместе с вами проверяем качество, подписываем акт сдачи-приемки и передаем гарантийные документы. На все работы предоставляется гарантия 10 лет.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Блок новостей -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Новости компании</h2>
            
            <div class="news_slider">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper newsSwiper">
                                <div class="swiper-wrapper">
                                    @foreach($news as $item)
                                    <div class="swiper-slide">
                                        <div class="news-item">
                                            <div class="news-item__img">
                                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                            </div>
                                            <div class="news-item__content">
                                                <div class="news-item__date">{{ $item['publish_date']->format('d.m.Y') }}</div>
                                                <h3 class="news-item__title">{{ $item['title'] }}</h3>
                                                <div class="news-item__text">
                                                    <p>{{ $item['excerpt'] }}</p>
                                                </div>  
                                            </div>
                                            <span class="btn details-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#newsModal"
                                                    data-title="{{ $item['title'] }}"
                                                    data-image="{{ $item['image'] }}"
                                                    data-date="{{ $item['publish_date']->format('d.m.Y') }}"
                                                    data-content="{{ $item['content'] }}">
                                                Читать далее <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Модальное окно -->
    <div class="modal-overlay" id="newsModal">
        <div class="modal-container">
            <button class="modal-close" id="modalClose">&times;</button>
            <h2 id="modalTitle"></h2>
            <img src="" alt="" class="news-modal-image" id="modalImage">
            <div class="modal-content" id="modalContent"></div>
        </div>
    </div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.newsSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                }
            }
        });
        // Получаем все кнопки "Подробнее"
            const detailButtons = document.querySelectorAll('.details-btn');
            const modal = document.getElementById('newsModal');
            const modalClose = document.getElementById('modalClose');
            
            // Обработчик для кнопок "Подробнее"
            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Заполняем модальное окно данными
                    document.getElementById('modalTitle').textContent = this.dataset.title;
                    document.getElementById('modalImage').src = this.dataset.image;
                    document.getElementById('modalImage').alt = this.dataset.title;
                    document.getElementById('modalContent').innerHTML = this.dataset.content;
                    
                    // Показываем модальное окно
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });
            
            // Закрытие модального окна
            modalClose.addEventListener('click', function() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });
            
            // Закрытие при клике вне модального окна
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });
    });
</script>
@endsection