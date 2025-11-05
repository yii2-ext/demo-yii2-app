<?php

/** @var yii\web\View $this */

 

$this->title = 'О нас - Наша компания';
$this->params['breadcrumbs'][] = 'О нас';

// Для корректной работы SEO
$this->params['meta_description'] = 'Узнайте больше о нашей компании, наших услугах и почему мы лучший выбор для ваших бизнес-задач.';
$this->params['meta_keywords'] = 'о компании, услуги, преимущества, отзывы, контакты';
?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5 section-gap">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold">Добро пожаловать в нашу компанию</h1>
                <p class="lead mb-4">Мы создаем инновационные решения для бизнеса, которые помогают нашим клиентам достигать выдающихся результатов.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#contact" class="btn btn-light btn-lg">Связаться с нами</a>
                    <a href="#services" class="btn btn-outline-light btn-lg">Наши услуги</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="services" class="py-5 bg-light section-gap">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="display-5 fw-bold">Наши услуги</h2>
                <p class="text-muted">Мы предлагаем широкий спектр услуг для вашего бизнеса</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="bi bi-gear fs-4"></i>
                        </div>
                        <h5 class="card-title">Разработка ПО</h5>
                        <p class="card-text text-muted">Создаем современные веб и мобильные приложения под ваши задачи.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="bi bi-bar-chart fs-4"></i>
                        </div>
                        <h5 class="card-title">Аналитика</h5>
                        <p class="card-text text-muted">Помогаем принимать обоснованные решения на основе данных.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 70px; height: 70px;">
                            <i class="bi bi-headset fs-4"></i>
                        </div>
                        <h5 class="card-title">Поддержка 24/7</h5>
                        <p class="card-text text-muted">Круглосуточная техническая поддержка для всех клиентов.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Company Section -->
<section class="py-5 section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold">О нашей компании</h2>
                <p class="lead">С 2010 года мы помогаем бизнесу расти и развиваться с помощью современных технологий.</p>
                <p>Наша команда экспертов объединяет талантливых разработчиков, дизайнеров и аналитиков, которые работают вместе, чтобы создавать решения, которые действительно работают.</p>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Индивидуальный подход</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Современные технологии</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Качественный результат</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Поддержка 24/7</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="rounded overflow-hidden shadow-lg">
                    <div class="bg-secondary" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light section-gap">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="display-5 fw-bold">Отзывы клиентов</h2>
                <p class="text-muted">Что говорят о нас наши клиенты</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle me-3" style="width: 50px; height: 50px;"></div>
                            <div>
                                <h6 class="mb-0">Алексей Петров</h6>
                                <small class="text-muted">CEO, ТехноСтар</small>
                            </div>
                        </div>
                        <p class="card-text">"Работа с этой компанией превзошла все наши ожидания. Профессионализм команды и качество результатов впечатляют."</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle me-3" style="width: 50px; height: 50px;"></div>
                            <div>
                                <h6 class="mb-0">Мария Сидорова</h6>
                                <small class="text-muted">Директор, ИнноваТек</small>
                            </div>
                        </div>
                        <p class="card-text">"Благодаря их решениям мы увеличили эффективность работы на 40%. Отличная команда профессионалов!"</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary rounded-circle me-3" style="width: 50px; height: 50px;"></div>
                            <div>
                                <h6 class="mb-0">Иван Козлов</h6>
                                <small class="text-muted">Основатель, СтартАп</small>
                            </div>
                        </div>
                        <p class="card-text">"Создали для нас уникальное решение, которое помогло вывести бизнес на новый уровень. Рекомендуем!"</p>
                        <div class="text-warning">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5 section-gap">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="display-5 fw-bold">Свяжитесь с нами</h2>
                <p class="text-muted">Готовы начать проект? Напишите нам!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Контактная информация</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <div class="d-flex">
                                    <div class="text-primary me-3">
                                        <i class="bi bi-geo-alt fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Адрес</h6>
                                        <p class="mb-0 text-muted">г. Москва, ул. Примерная, д. 10</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex">
                                    <div class="text-primary me-3">
                                        <i class="bi bi-telephone fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Телефон</h6>
                                        <p class="mb-0 text-muted">+7 (495) 123-45-67</p>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex">
                                    <div class="text-primary me-3">
                                        <i class="bi bi-envelope fs-5"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Email</h6>
                                        <p class="mb-0 text-muted">info@company.com</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Отправить сообщение</h5>
                        <form id="contact-form" method="post">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Ваше имя" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Ваш email" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" class="form-control" name="subject" placeholder="Тема сообщения" required>
                        </div>
                        
                        <div class="mb-3">
                            <textarea class="form-control" name="body" rows="4" placeholder="Ваше сообщение" required></textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Отправить сообщение</button>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
