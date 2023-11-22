<?php

$arrSize = 10;    //Size of the square
$sqrSize = 50;    //The size in pixels of one tile of the square
$route = true;
$pozX = 0;
$pozY = 0;
$num = 1;

$arr = array_fill(0, $arrSize, array_fill(0, $arrSize, 0));

do
{
    Horizontal();
    Vertical();
    $route = !$route;
} while($num <= $arrSize * $arrSize);


function Horizontal()
{
    global $arrSize, $pozX, $pozY, $num, $arr, $route;
    do
    {
        $arr[$pozX][$pozY] = $num;
        if($num == ($arrSize * $arrSize))
            return;
        $num++;
        if($route)
            $pozX++;
        else
            $pozX--;
        if ($pozX == $arrSize - 1 || $pozX == 0)
        {
            if ($arr[$pozX][$pozY] > 0) {
                if ($route) {
                    $pozX--;
                    $pozY++;
                }
                else
                {
                    $pozX++;
                    $pozY--;
                }
            }
            return;
        }
    } while($arr[$pozX][$pozY] == 0);
    if($route)
    {
        $pozX--;
        $pozY++;
    }
    else
    {
        $pozX++;
        $pozY--;
    }
}

function Vertical()
{
    global $arrSize, $pozX, $pozY, $num, $arr, $route;
    do {
        $arr[$pozX][$pozY] = $num;
        $num++;
        if ($route)
            $pozY++;
        else
            $pozY--;
        if ($pozY == $arrSize - 1) {
            if ($arr[$pozX][$pozY] > 0) {
                if ($route) {
                    $pozY--;
                    $pozX--;
                }
            }
            return;
        }
    } while ($arr[$pozX][$pozY] < 1);
    if ($route) {
        $pozY--;
        $pozX--;
    } else {
        $pozY++;
        $pozX++;
    }
}

$red = 0;
$green = 0;
$blue = 0;
$kor = 255/($arrSize * $arrSize);

echo '<table border="1">';
for ($i=0; $i<$arrSize; $i++)
{
    echo  '<tr>';
    for ($j=0; $j<$arrSize; $j++){
        $red = $arr[$j][$i] * $kor;
        $green = $arr[$j][$i] * $kor;
        $blue = $arr[$j][$i] * $kor;
        echo '<td style ="width: '.$sqrSize.'px; height: '.$sqrSize.'px; background-color: rgb('.$red.','.$green.','.$blue.');"></td>';
    }
//    $red = 0;
//    $green = 0;
//    $blue = 0;
}
