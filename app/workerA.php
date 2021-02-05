<?php

include "loop.php";

function workerA($task) {
    sleep(10);
    return true;
}

loop('workerA', 'message->>"$.job" = "a" AND message->>"$.async" = "on"');
