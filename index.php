<?php


namespace main;

require "curl.php";
require "offers.php";
require "conversions.php";

function pretty_var_dump($data)
{
    echo "<pre>"; var_dump($data); echo "</pre>";
}

/*
Получить информацию о доступном оффере. Какие страны доступны в этом оффере. Вывести список этих стран.
Также получить уже имеющуюся конверсию. Уточнить, имеющаяся в статистике, относится ли она к офферу.
Если да, то вывести ClickID конверсии, а также вывести откуда она была.
В данном API вы имеете ключ партнера, не админ.
 */

$offers = getOffers();
$converses = getConverses();
for ($i=0; $i < count($offers); $i++){
    foreach ($converses as $converse ){
        if($converse['offer_id'] == $offers[$i]['id']){
            $offers[$i]['conversion_id'] = $converse['conversion_id'];
        }
    }
}

//pretty_var_dump(getOffers());
//pretty_var_dump(getConverses());

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <thead>
            <tr>
                <td>#</td>
                <td>id</td>
                <td>Offer_id</td>
                <td>Название</td>
                <td>Страны</td>
                <td>conversion_id</td>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; foreach ($offers as $offer):
            $countries = (isset($offer['countries'])) ? implode(", ", $offer['countries']) : "-";
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$offer['id'] ?></td>
                <td><?=$offer['offer_id'] ?></td>
                <td><?=$offer['title'] ?></td>
                <td><?=$countries ?></td>
                <td><?=$offer['conversion_id'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
