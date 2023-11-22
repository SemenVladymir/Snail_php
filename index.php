<?php
//$varData = 100000000000000;
//$timeofday = gettimeofday();
//$nowDate = sprintf('%d%d', $timeofday["sec"], $timeofday["usec"] / 1000);
//var_dump($nowDate);
//$varSec = $varData%60;
//$varMin = intdiv($varData, 60)%60;
//$varHours = intdiv(intdiv($varData, 3600),24)%24;
//$varDays = intdiv(intdiv($varData, 3600), 24)%365;
//$varYears = intdiv(intdiv($varData, 86400), 365);
//
//if ($varData > $nowDate)
//    echo '<p style="color: red">Years - '.$varYears.', Days - '.$varDays.',  Time - '.$varHours.':'.$varMin.':'.$varSec. '</p>';
//else
//    echo '<p style="color: green">Years - '.$varYears.', Days - '.$varDays.',  Time - '.$varHours.':'.$varMin.':'.$varSec. '</p>';

$arrSize = 10;
$sqrSize = 50;
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
