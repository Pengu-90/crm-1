<?php

$array = array(
    [
        'count' => 5
    ],
    [
        'count' => 5

    ],
);

for ($i = 0; $i < count($array); $i++) {
    $check = $i;
    $i++;
    if ($i != count($array)) {
        if ($array[$i]['count'] < $array[$check]['count']) {
            $array[$i]['count']++;

            break;
        } else if ($array[$i]['count'] >= $array[$check]['count']) {
            $i--;
            $array[$i]['count']++;

            break;
        } else {
            $i--;

        }
    }
}

echo "<br>";


foreach ($array as $arr) {
    echo $arr['count'];
}
