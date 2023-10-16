## Установка

Скачать репозиторий

```bash
git clone https://github.com/3Poni/RESTfullApi.git .
```

Далее скопировать .env.example в рабочий .env

```bash
cp .env.example .env
```

Далее запустим docker (команду выполнять из корня проекта)

```bash
docker-compose up -d
```

После того как все 3 контейнера будут запущены (nginx, pgsql, php-fpm)

Выполнить поочередно следующие команды:

```bash
docker exec -it app_php composer install --no-interaction

docker exec app_php bash -c " php artisan key:generate ; php artisan config:clear ; php artisan cache:clear; php artisan migrate ; php artisan db:seed"
```
После чего приложение будет доступно по адресу:

```bash
http://127.0.0.1:8000/api/v1/applications
```

## Использование

Обязательно отправлять 2 заголовка:

"Content-type: application/json"

"Accept: application/json"

Описание ресурсов

| Ресурс | Метод | Описание |
|:---------:|:---------:|:---------:|
| /api/v1/applications | GET | Получить все "заявки" |
| /api/v1/applications | POST | Добавить новую "заявку" |
| /api/v1/applications/{id} | PUT | Обновить все данные в "заявке" |
| /api/v1/applications/{id} | PATCH | Обновить часть данных в "заявке" |
| /api/v1/applications/{id} | DELETE | Удалить "заявку" |

Данные в теле запроса:

| Ключ | Значение | Описание |
|:---------:|:---------:|:---------:|
| "dealer_name" | строка | Название диллера |
| "dealer_manager" | строка | Имя Фамилия менеджера |
| "credit_sum" | число | сумма кредита |
| "credit_term" | число | срок кредита |
| "credit_rate" | число | процентная ставка по кредиту |
| "credit_description" | строка | описание причины кредита |
| "credit_status" | строка | статус заявки |
| "bank_id" | число | id банка (указать от 1 до 7) |

При использовании метода PATCH можно указывать не все поля из списка выше

В случае же POST и PUT нужно полное тело запроса


 Пример тела запроса при использовании методов POST, PUT, PATCH:

```bash
{
        "dealer_name": "Название диллера",
        "dealer_manager": "Имя Фамилия",
        "credit_sum": 999999,
        "credit_term": 99,
        "credit_rate": 19,
        "credit_description": "Без ПВ, без СЖ",
        "credit_status": "новая",
        "bank_id": 9
}
```



