# Пример исполнения асинхронных задач с произвольным кодом на PHP (Yii2 framework)

# Установка
Необходимо предварительно установить docker.
Запустить в каталоге проекта: <br>
 
<code>docker-compose up -d --build && docker-compose exec backend composer install && docker-compose exec backend /usr/local/bin/php yii migrate --interactive 0</code>
 
# Использование
Для авторизации в backend используйте логин admin пароль secret
Перейти в менеджер задач: <br>

http://localhost:21080/task/index

Добавьте задачу с произвольным кодом на PHP. После добавления она сразу будет выполнена N кол-вом потоков (workers).
Результаты выполнения посмотреть в  <br>

<code>/app/console/runtime/logs/workers{task_id}-{worker_number}.log</code>

Пример кода для задачи, чтобы проверить асинхронность выполнения задач: <br>

<code>$pid = mt_rand(100,999); echo $pid . ' ' . microtime(1)."\n"; sleep(rand(1,10)); echo $pid . ' ' . microtime(1);</code>

# Обратить внимание
* В проекте автоматически создаётся БД yii2advanced (параметры в docker-compose)
* Пользователи (3 шт) автоматически создаются в первичных миграциях (там же можно посмотреть параметры доступа)
* Файлы конфигураций доступа хранятся в проекте (для рабочего проекта нужно их вынести в переменные окружения)
