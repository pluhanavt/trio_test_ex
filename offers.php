<?php

namespace main;

/**
 * Возвращает офферы
 * @return array
 */
function getOffers()
{
    $method = "/3.0/offers";

    $page = 1;
    $options = ["page=" . $page];

    $data = getData($method, $options);
    $offers = $data['offers'];

    while(isset($data['pagination']['next_page'])){
        $page++;
        $options = ["page=" . $page];
        $data = getData($method, $options);

        $offers = array_merge($offers, $data['offers']);
    }


    return $offers;

}
