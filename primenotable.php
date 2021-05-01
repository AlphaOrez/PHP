<html>
<body>
<?php
function findprime($number)
{
    if ($number == 1)
        return 0;
    else if(strpos($number,".") !== false)
        return 0;

    for ($i = 2; $i <= $number/2; $i++)
    {
        if ($number % $i == 0)
            return 0;
    }
    return 1;
}
$array[10][10]=array();
$counter = 0.0;
$value = 0.0;

for ($i = 0; $i < 10; $i++)
{
    for ( $j = 0; $j < 10; $j++)
    {
        $array[$i][$j] =0 ;

    }
}

for ( $x = 0; $x < 10; $x++)
{
    $value++;
    $array[$x][$counter] = $value;
}
$counter = 1;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{

    $value=$value+0.5;
    $array[$x][$counter] = $value;
}
$counter = 2;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{
    $value = $value + 0.3;
    $array[$x][$counter] = $value;
}
$counter = 3;
$value = 0;
for ($x = 0; $x < 10; $x++)
{
    $value = $value + 0.25;
    $array[$x][$counter] = $value;
}
$counter = 4;
$value = 0;
for ($x = 0; $x < 10; $x++)
{
    $value = $value + 0.2;
    $array[$x][$counter] = $value;
}
$counter = 5;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{
    $value = $value + 0.16;
    $array[$x][$counter] = $value;
}
$counter = 6;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{
    $value = $value + 0.14;
    $array[$x][$counter] = $value;
}
$counter = 7;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{
    $value = $value + 0.12;
    $array[$x][$counter] = $value;
}
$counter = 8;
$value = 0;
for ( $x = 0; $x < 11; $x++)
{
    $value = $value + 0.11;
    $array[$x][$counter] = $value;
}
$counter = 9;
$value = 0;
for ( $x = 0; $x < 10; $x++)
{
    $value = $value + 0.1;
    $array[$x][$counter] = $value;
}




echo "<table border=10  style=background-color: blue><tr><th style=background-color:greenyellow>1</th><th style=background-color:greenyellow>2</th><th style=background-color:greenyellow>3 </th><th style=background-color:greenyellow>4 </th><th style=background-color:greenyellow>5 </th><th style=background-color:greenyellow>6</th><th style=background-color:greenyellow>7 </th><th style=background-color:greenyellow>8 </th><th style=background-color:greenyellow>9 </th><th style=background-color:greenyellow>10 </th></tr>";

for ($i = 0; $i < 10; $i++)
{
    echo "<tr>";
    for ( $j = 0; $j < 10; $j++)
    {
        $number=$array[$i][$j];
        $flag = findprime($number);
        if ($flag ==1) {
            $result="P";
            echo"<td style=background-color:lightslategrey>" .($array[$i][$j]).($result)."</td>";
        }
        else{
            $result="NP";
            echo"<td style=background-color:lightblue>" .($array[$i][$j]).($result)."</td>";

        }

    }
    echo "</tr>";
}
echo "</table>";


?>
</tbody>
</table>



</body>
</html>

