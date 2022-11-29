<?php

function sum($a, $b){
    if($a !== 0 && $b !== 0){
        return $a + $b;
    }
    return "$a or $b is 0";
}
function minus($a, $b){
    if($a !== 0 && $b !== 0){
        return $a - $b;
    }
    return "$a or $b is 0";
}

function calc($a, $b, $operation){
    if (function_exists($operation)){
        return $operation($a, $b);
    } 
    return "Error";
}

echo calc(10, 2, 'minus');

// Возведение в степень
echo power(5, 3);

function power ($val, $pow){
    if ($pow === 0){
        return 1;
    }

    $pow--;
    $result = power($val, $pow) * $val;
    return $result;
}


function getName($value, $a = 'час', $b = 'часа', $c = 'часов'){
    if($value > 20){
        $value %= 10;
    }
    if($value == 1){
        return $a;
    }
    if($value > 1 && $value < 5){
        return $b;
    }

}

$time = time();

getName ((int) date ('H', $time));
getName ((int) date ('i', $time), 'минута', 'минуты', 'минут');

$a = 1;
while ($a <= 10){
   echo $a++;
   if($a === 7){
    echo "<b>$a</b>";
   }
}
echo 'end';

echo "</br>";
echo "</br>";


// Таблица умножения
for($i = 0; $i <= 3; $i++){
    for ($j = 0; $j <= 3; $j++){
        echo $j * $i . ' ';
    }
    echo '</br>';
}

$array = [
    0 => 'Text',
    1123 => 12,
    2 => true,
    3 => 45.5,
    4 => [
        // '1st' => 'First of Second',
        // '2nd' => 'Second of Second',
        // 3 => 'Third of Second'
        'admin', 'user', 'vip', 'root'
    ]
];

$array[] = 'New Text';
// $second_of_second = $array[];
// echo '<pre>';
// var_dump($array[4][2]);
// echo '</pre>';

for($i = 0; $i <= 3; $i++){
    echo "<h1>$array[4][$i]</h1>";

}

// echo <<<php
// {$array[4][2]}
// php;

foreach($array as $key => $value){
    // var_dump($value);
    // var_dump($key);
    echo '<br>' . $key . ' => ';
    // Проверка вложенного массива
    if(is_array($value)){
        // foreach($value as $key_sub){
        //     echo $key_sub . ' ';
        // }
        echo implode(', ', $value);
        continue;
    }
}

?>

<?php //for ($i = 0; $i < count($array[4]); $i++) :?>
    <!-- <h1>1<?= $array[4][$i . 'st'] ?></h1> -->
    </br>
<?php //endfor;?>

<?php
$num = 3;
while ($num <= 100){
    echo $num . ' ';
    $num += 3;
}

$region = [
    'Первый' => ['First', 'Second', 'Third'],
    'Второй' => ['First2', 'Second2', 'Third2']
];

// foreach($region as $key => $val){
//     echo "$key:</br>";
//     echo implode(', ', $val) . '</br>';
// }

function k_cities($region){
    foreach($region as $city){
        foreach($city as $town){
            if(mb_substr($town, 0, 1) === "T"){
                echo '$town </br>';
            }
        }
    }
}

// for($i = 0; $z = 0; $i <= 3; $i++){
//     echo $z++ . ' ';
//     for($j = 1; $j <= 3; $j++){
//         $factor = ($i == 0) ? 1 : $i;
//         echo($factor * $j) . ' ';
//     }
//     echo "</br>";
// }