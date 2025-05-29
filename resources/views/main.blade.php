@extends('layouts.app')
@section('title', 'Главная')

@section('content')
    <section class="block-index">
        <div class="container">
            <h1>Строительная компания "ПроектСтрой"</h1>
            <p>Мы создаем качественное и комфортное жилье с 2005 года. Наша команда профессионалов реализует проекты любой сложности. Доверьте нам строительство вашего дома - и вы получите надежный результат в срок.</p>
            <a href="/services" class="btn">Наши услуги</a>
            <a href="/portfolio" class="btn btn-outline">Наше портфолио</a>
        </div>
    </section>

     <section class="about">
        <div class="container">
            <div class="about-content">
                <h2>О нашей компании</h2>
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="О компании">
                </div>
                <div class="about-text">
                    <p>Строительная компания "ПроектСтрой" работает на рынке более 15 лет. За это время мы реализовали более 200 успешных проектов в разных регионах страны. Наша команда состоит из высококвалифицированных специалистов с многолетним опытом работы.</p>
                    <p>Мы используем только качественные материалы и современные технологии строительства, что позволяет нам гарантировать долговечность и надежность наших объектов. Наши принципы - это прозрачность, ответственность и индивидуальный подход к каждому клиенту.</p>
                    <p>Каждый наш проект - это тщательно продуманное решение, сочетающее в себе функциональность, эстетику и долговечность. Мы стремимся к тому, чтобы результат нашей работы превосходил ожидания клиентов.</p>
                    <p>Наши специалисты всегда готовы проконсультировать вас по всем вопросам, связанным со строительством и ремонтом. Мы предлагаем полный цикл услуг - от разработки проекта до сдачи объекта "под ключ".</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="advantages">
        <div class="container">
            <div class="section-title">
                <h2>Наши преимущества</h2>
            </div>
            <div class="advantages-grid">
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Качество</h3>
                    <p>Используем только проверенные материалы и технологии, соответствующие ГОСТам</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Опыт</h3>
                    <p>15 лет успешной работы на рынке строительных услуг</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Гарантия</h3>
                    <p>Предоставляем гарантию 10 лет на все выполненные работы</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-ruble-sign"></i>
                    </div>
                    <h3>Цены</h3>
                    <p>Гибкая система ценообразования и индивидуальный подход</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Отзывы -->
    <section class="reviews">
        <div class="container">
            <div class="section-title">
                <h2>Отзывы наших клиентов</h2>
            </div>
            <div class="reviews-grid">
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Иван Петров">
                        </div>
                        <div>
                            <div class="review-author">Иван Петров</div>
                            <div class="review-date">15.03.2023</div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Обратился в "ПроектСтрой" для строительства загородного дома. Остался очень доволен результатом! Все работы выполнены качественно и в срок. Особенно хочу отметить профессиональный подход прораба Александра, который контролировал все этапы строительства. Рекомендую!</p>
                    </div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Елена Смирнова">
                        </div>
                        <div>
                            <div class="review-author">Елена Смирнова</div>
                            <div class="review-date">02.11.2022</div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Заказывали ремонт квартиры в новостройке. Сделали все точно по договору, без накруток и скрытых платежей. Дизайнер помогла подобрать материалы, которые уложились в наш бюджет. После сдачи квартиры обнаружили пару мелких недочетов, которые были устранены в течение дня. Спасибо!</p>
                    </div>
                </div>
                <div class="review-item">
                    <div class="review-header">
                        <div class="review-avatar">
                            <img src="https://randomuser.me/api/portraits/men/68.jpg" alt="Олег Васильев">
                        </div>
                        <div>
                            <div class="review-author">Олег Васильев</div>
                            <div class="review-date">28.07.2022</div>
                        </div>
                    </div>
                    <div class="review-text">
                        <p>Строили с "ПроектСтрой" торговый центр. Проект сложный, с множеством технических нюансов. Команда справилась на отлично! Все коммуникации проложены грамотно, отделка выполнена качественно. Уже второй год арендаторы не нарадуются. Планируем дальнейшее сотрудничество.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
