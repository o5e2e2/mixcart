<?php

include "loop.php";

function worker1($task) {
    sleep(10);
    return true;
}

loop('worker1', 'message->>"$.async" IS NULL');
