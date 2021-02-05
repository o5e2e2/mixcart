1) https://docs.docker.com/engine/install/
2) https://docs.docker.com/compose/install/
3) git clone mixcart && cd mixcart
4) make start && make stop (явно не остановленные контейнеры будут сразу перезапущены после перезагрузки докер хоста, это фича)
5) make rebuild (заново создает контейнеры и чистую базу)
6) make workers (просто запускает пачку воркеров)
5) 127.0.0.1:8000/form.php - форма создания сообщений
6) воркеры работают как фоновые процессы, зайти в контейнер воркеров можно `make cli`
7) зайти в контейнер базы `make mysql`, а в нем `mysql -u mixcart -D mixcart`
