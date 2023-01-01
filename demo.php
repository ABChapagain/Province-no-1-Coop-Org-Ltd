<?php

$arr = [1, 2, 3, 4, 5, 6, 7, 8];

$i = 0;
while ($i < 8) {
    echo "START\n";
    for ($j = 0; $j < 2; $j++) {
        echo $arr[$i] . "\n";
        $i++;
    }
    echo "END\n";
    echo "For the streak";
}