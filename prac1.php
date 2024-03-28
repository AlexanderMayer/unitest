<?php

function number_crunching()
{
    $count = 0;
    $X = [575, 1, 65, 80, 293, 7340, 325, 85654, 1245, 8608, 54, 234, 1467, 101, 2323, 8909, 124, 6343, 11214, 4];
    $Z = [];
    $temp_num_1 = $temp_num_2 = $X[0];
    foreach ($X as $value) {
        if (check_zero($value) === false && check_count($count,$value)  >= 3) {
            if (check_num($value) === false && $value < $temp_num_1) {
                $temp_num_1 = $value;
            }
            if (check_num($value) === true && $value > $temp_num_2) {
                $temp_num_2 = $value;
            }
            array_push($Z, "$value");
        }
    }
    $temp_key_1 = array_search($temp_num_1, $Z);
    $temp_key_2 = array_search($temp_num_2, $Z);
    echo "<pre> Начальный массив ";
    print_r($X);
    echo "</pre>";
    echo "<pre> Новый массив до изменения ";
    print_r($Z);
    echo "</pre>";
    echo "</br>";
    echo "Наименьшее простое число - ".$temp_num_1;
    echo "</br>";
    echo "Наибольшее составное число - ".$temp_num_2;
    $Z[$temp_key_1] = $temp_num_2;
    $Z[$temp_key_2] = $temp_num_1;
    echo "<pre> Новый массив после изменения ";
    print_r($Z);
    echo "</pre>";
}

function check_zero($num)
{
    $flag = true;
    while ($num % 10 > 0)
    {
        if($num % 10 === 0) $flag = true;
        else $flag = false;
        $num /= 10;
        $num = floor($num);
    }
    return $flag;
}

function check_count($count,$num)
{
    while ($num % 10 > 0)
    {
        $num /= 10;
        $num = floor($num);
        $count++;
    }
    return $count;
}

function check_num($num)
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return true;
        }
    }
    return false;
}

number_crunching();