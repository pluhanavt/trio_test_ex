<?php

namespace main;

/**
 * Возвращает конверсии
 * @return array
 */
function getConverses()
{
    $method = "/3.0/stats/conversions";

    $page = 1;
    $options = ["date_from=01-05-1997"];

    $data = getData($method, $options);
    $converse = $data['conversions'];

    while(isset($data['pagination']['next_page'])){
        $page++;
        $options['page'] = ["page=" . $page];
        $data = getData($method, $options);

        $converse = array_merge($converse, $data['conversions']);
    }


    return $converse;

}


