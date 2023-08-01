# API_php_class

- Архитектура на PHP 7.1

----
#### Запросы:
1. GET

| Описание запроса                    |                      Пример                       | 
|-------------------------------------|:-------------------------------------------------:| 
| _Получить всех пользователей_       |      https://localhost:3000/req.php?mode=all      | 
| _Получить посты пользователя по ID_ | https://localhost:3000/req.php?mode=byid&id={id}  |
| _Получить TODOS пользователя по ID_ | https://localhost:3000/req.php?mode=todos&id={id} |


2. Post

| Описание запроса     |                       Пример                        | 
|----------------------|:---------------------------------------------------:| 
| _Добавить пост_      |       https://localhost:3000/req.php?mode=add       | 
| body                 |     ```{title: 'foo',text: 'bar',userId: 1}```      |
| _Редактировать пост_ |      https://localhost:3000/req.php?mode=edit       | 
| body                 | ```{title: 'foo',text: 'bar',userId: 1,postId:1}``` |
| _Удалить пост_       |     https://localhost:3000/req.php?mode=delete      | 
| body                 | ```{postId:1}``` |






