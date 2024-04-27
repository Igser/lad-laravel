# Установка
- php artisan storage:link

# Настройка
- App config
- Laravel Pint
- Xdebug

# Жизненный цикл
- Инициализация сервисов
- Обработка запроса (Routing и Middleware)
- Обработка контроллера (Controller)
- Генерация и отправка ответа (Response)


# Маршрутизация

# Middleware
Посредники реализуют паттерн [`Цепочка обязанностей (Chain of Responsibility)`](https://refactoring.guru/ru/design-patterns/chain-of-responsibility) 
в соответствие с [PSR-15](https://www.php-fig.org/psr/psr-15/). Это поведенческий паттерн проектирования, который позволяет передавать запросы последовательно по цепочке обработчиков.

- php artisan make:middleware SomeMiddleware

Локальный и глобальный стек посредников
