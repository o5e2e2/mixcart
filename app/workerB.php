<?php

include "loop.php";

function workerB($task) {
    sleep(10);
    return true;
}

loop('workerB', 'message->>"$.job" = "b" AND message->>"$.async" = "on"');
