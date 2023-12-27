Запуск приложения

Разверните сервисы веб-приложения:

**Unix (macOS, Ubuntu):**

```
make up
```

**Windows:**

```
docker compose -f docker-compose.yml up --build -d
```


### Остановка приложения

Сверните сервисы веб-приложения:

**Unix (macOS, Ubuntu):**

```
make down
```

**Windows:**

```
docker compose -f docker-compose.yml stop
```