<?php

$baseDir = __DIR__;

function my_exec(string $phpfile) {
    exec("php $phpfile > /dev/null 2>&1 &");
}

// singleton
my_exec("$baseDir/worker1.php");

for ($i = 0; $i < 2; $i++) {
    my_exec("$baseDir/workerA.php");
}

for ($i = 0; $i < 3; $i++) {
    my_exec("$baseDir/workerB.php");
}
