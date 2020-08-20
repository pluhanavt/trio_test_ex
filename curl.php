<?php
namespace main;


function getData($method, $options = "")
{

    if(!empty($options) && is_array($options)){
        $options = "&" . implode("&", $options);
    }


    $api_key = "e60a98867d363b0d43b9e7c58ec498ed";
    $api_domain = "http://api.cpanomer1.affise.com";


    $url = $api_domain . $method . "?API-Key=" . $api_key . $options;

    echo "<p>" . $url . "</p>";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    $result = curl_exec($ch);
    if(curl_error($ch)) {
        echo curl_error($ch);
    }
    curl_close($ch);

    $result = json_decode($result, true);


    return $result;
}

