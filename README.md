# Async PHP workers

# Install
Запустить в каталоге проекта: <br>
 
<code>docker-compose up -d --build && docker-compose exec backend composer install && docker-compose exec backend /usr/local/bin/php yii migrate --interactive 0</code>
 
# Use
http://localhost:21080/task/index

Добавьте задачу. После добавления она будет выполнена.
Результаты выполнения в /app/console/runtime/logs/workers$id-$i.log

Код для задачи, чтобы проверить асинхронность:

$pid = mt_rand(100,999); echo $pid . ' ' . microtime(1)."\n"; sleep(rand(1,10)); echo $pid . ' ' . microtime(1);
