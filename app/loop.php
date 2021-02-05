<?php

function loop(callable $worker, string $condition = '1 = 1') {
    $db = new Pdo('mysql:host=mysql;dbname=mixcart;charset=utf8','mixcart');
    $pid = getmypid();

    while (true) {
        $db->prepare("UPDATE queque SET worker = ? WHERE worker IS NULL AND ($condition) ORDER BY id LIMIT 1")->execute([$pid]);

        $select = $db->prepare('SELECT * FROM queque WHERE worker = ?');
        $select->execute([$pid]);
        $work = $select->fetchAll(PDO::FETCH_OBJ);

        if (empty($work)) {
            usleep(random_int(0,1000000));
            continue;
        }

        foreach ($work as $task) {
            $id = $task->id;

            $task->message = json_decode($task->message, false);
            $result = call_user_func($worker, $task);

            if ($result === false) {
                //reject
                $db->prepare('UPDATE queque SET worker = NULL WHERE id = ? AND worker = ?')->execute([$id, $pid]);
                continue;
            }
            else {
                //resolve
                $db->prepare('DELETE FROM queque WHERE id = ? AND worker = ?')->execute([$id, $pid]);
            }
        }
    }
}
