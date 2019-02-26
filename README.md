# choco-test

  Есть две таблицы: :one: blogs и :two: comments. Для них есть две API-ишки(ниже):arrow_down:.

## API: Blogs

API | Запрос | Описание
------------ | ------------- | -------------
api/blogs | GET | *Вывести список всех статей*
api/blogs | POST | *Создать статью*
api/blogs/{id} | GET | *Получить одну статью*
api/blogs/{id} | PUT | *Редактировать статью*
api/blogs/{id} | DELETE | *Удалить статью*
api/blogs?search=example | GET | *Поиск по статьям*

## API: Comments

API | Запрос | Описание
------------ | ------------- | -------------
api/blogs/{blog_id}/comments | GET | *Вывести список все комментарий одной статьи*
api/blogs/{blog_id}/comments | POST | *Создать комментарию для одной статьи*
api/blogs/{blog_id}/comments/{id} | GET | *Получить комментарию*
api/blogs/{blog_id}/comments/{id} | PUT | *Редактировать комментарию*
api/blogs/{blog_id}/comments/{id} | DELETE | *Удалить комментарию*
