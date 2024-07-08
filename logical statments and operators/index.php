<!--  #Q1 -->
<?php
$year = 2000;
echo "<br>";
echo "<br>";
$leap = date('L', mktime(0, 0, 0, 1, 1, $year)); //mktime(hour, minute, second, month, day, year)
echo $year . ' ' . ($leap ? 'is' : 'is not') . ' a leap year.';
?>
<!--  #Q2 -->
<?php
echo "<br>";
echo "<br>";
$temp = 15;
echo $temp < 20 ? "winter" : "summer" ;
?>
<!--  #Q3 -->
<?php
echo "<br>";
echo "<br>";
$num1 = 10;
$num2 = 10;
if( $num1 === $num2){
    echo ($num1 + $num2) * 3;
}else
echo $num1 + $num2;


?>
<!--  #Q4 -->
<?php
echo "<br>";
echo "<br>";
$num1 = 15;
$num2 = 10;
if( $num1 + $num2 === 30)
echo $num1 + $num2;
else
echo "false";

?>
<!--  #Q5 -->
<?php
echo "<br>";
echo "<br>";
$number = 20;
if ($number >=0 && $number % 3 === 0)
echo $number;
else 
echo "false (Q5)"
?>
<!--  #Q6 -->
<?php
echo "<br>";
echo "<br>";
$number = 20;
if ($number >=20 &&$number <=50 )
echo "true";
else 
echo "false (Q6)"
?>
<!--  #Q7 -->
<?php
echo "<br>";
echo "<br>";
$number1 = 6;
$number2 = 8;
$number3 = 3;
if ($number1 >=$number2  && $number1 >=$number3  )
echo "the largest is " . " " . $number1;
if ($number2 >=$number1  && $number2 >=$number3  )
echo "the largest is " . " " . $number2;
if ($number3 >=$number2  && $number3 >=$number1  )
echo "the largest is " . " " . $number3;

?>
<!-- #Q8 -->
<?php
echo "<br>";
echo "<br>";
$units = 10;
$remainingUnits = $units;
$total = 0;

if ($remainingUnits > 0) {
    if ($remainingUnits <= 50) {
        $total += $remainingUnits * 2.5;
        $remainingUnits = 0;
    } else {
        $total += 50 * 2.5;
        $remainingUnits -= 50;
    }
}

if ($remainingUnits > 0) {
    if ($remainingUnits <= 100) {
        $total += $remainingUnits * 5;
        $remainingUnits = 0;
    } else {
        $total += 100 * 5;
        $remainingUnits -= 100;
    }
}

if ($remainingUnits > 0) {
    if ($remainingUnits <= 100) {
        $total += $remainingUnits * 6.2;
        $remainingUnits = 0;
    } else {
        $total += 100 * 6.2;
        $remainingUnits -= 100;
    }
}

if ($remainingUnits > 0) {
    $total += $remainingUnits * 7.5;
}

echo $total;
?>
<!-- #Q9 -->
<?php
echo "<br>";
echo "<br>";
$num1 = 10;
$num2 = 5;
$op = "*";
$result = 0;
switch($op){
    case "+";
    echo $num1 + $num2;
    break;
    case "-";
    echo $num1 - $num2;
    break;
    case "*";
    echo $num1 * $num2;
    break;
    case "/";
    echo $num1 / $num2;
    break;
}
?>
<!-- #Q10 -->
<?php
echo "<br>";
echo "<br>";
$age = 18;
if ($age >= 18)
echo "eligible to vote";
else
echo " not eligible to vote"
?>
<!-- #Q11 -->
<?php
echo "<br>";
echo "<br>";
$number = 10;
if ($number > 0)
echo $number . " is positive";
else if ($number < 0)
echo $number . " is negative";
else
echo $number . " is Zero";
?>
<!-- #Q12 -->
<?php
echo "<br>";
echo "<br>";
$grade = 100;
if($grade > 0 && $grade < 60)
echo "your grade is F";
else if ($grade >= 60 && $grade < 70)
echo "your grade is D";
else if ($grade >= 70 && $grade < 80)
echo "your grade is C";
else if ($grade >= 80 && $grade < 90)
echo "your grade is B";
else if ($grade >= 90 && $grade <= 100)
echo "your grade is A";
else
echo "invaild grade"
?>
