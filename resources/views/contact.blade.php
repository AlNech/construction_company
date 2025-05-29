@extends('layouts.app')
@section('styles')
    @vite(['resources/css/contact.css'])
@endsection
@section('title', 'Контакты')

@section('content')
<section class="block-contacts">
        <div class="container">
            <h1>Наши контакты</h1>
            <p>Свяжитесь с нами любым удобным способом - мы всегда готовы ответить на ваши вопросы</p>
        </div>
</section>


@if(session('success'))
<section class="success-message-container">
    <div class="container">
        <div class="success-message">
            {{ session('success') }}
        </div>
    </div>
</section>  
@endif

<section class="contact-section">
    <div class="container">
        <div class="contact-container">

            <div class="contact-form">
                <h2>Обратная связь</h2>
                <form action="{{ route('contact.submit') }}" method="POST" id="feedbackForm">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Ваше имя*</label>
                        <input type="text" id="name" name="name"  required minlength="2" maxlength="255" class="form-control @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Телефон*</label>
                        <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                            value="{{ old('phone') }}" required pattern="[\+]\d{1,3}\s?[(]{0,1}\d{1,4}[)]{0,1}\s?\d{1,4}[\-]\d{1,4}[\-]\d{1,4}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" 
                                rows="5">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Отправить заявку</button>
                </form>
                
            </div>



            <div class="contact-info">
                    <div class="contact-card">
                        <h2>Контактная информация</h2>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Юридический адрес</h3>
                                <p>г. Москва, ул. Строителей, 15, офис 204</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Телефоны</h3>
                                <p>
                                    <a href="tel:+71234567890">+7 (123) 456-78-90</a><br>
                                    <a href="tel:+79876543210">+7 (987) 654-32-10</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Email</h3>
                                <p>
                                    <a href="mailto:info@proektdom.ru">info@proektdom.ru</a><br>
                                    <a href="mailto:sales@proektdom.ru">sales@proektdom.ru</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h3>Режим работы</h3>
                                <p>
                                    Пн-Пт: 9:00 - 18:00<br>
                                    Сб-Вс: выходной
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>



<!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.373789929732!2d37.61842331593095!3d55.75369628055314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a5a738fa419%3A0x7c347d506f52311a!2z0JrRgNCw0YHQvdCw0Y8g0YPQuy4sIDE1LCDQnNC-0YHQutCy0LAsIDEyMzAyMg!5e0!3m2!1sru!2sru!4v1686754326784!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection