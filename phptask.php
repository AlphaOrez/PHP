<?php
$input = "A89C89";
$a=strlen($input);
$a=$a-2;
echo "New string is : ";
for($x=0;$x<$a;$x++)
{
    echo $input[$x];
}
?>





//second task

<?php

$result = 0;
$input = "1,2,3,4,5,6,7";
$sum = 0;
foreach (explode(",", $input) as $val)
    $sum = $sum + (int)$val;
echo "Sum is = " . $sum;

?>
