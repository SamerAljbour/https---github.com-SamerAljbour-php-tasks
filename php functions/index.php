<!-- #Q1 -->
<?php 
echo "<br>";
echo "<br>";
$number =5 ;
function checkIfPrime ($number){
    if($number % 2 !== 0 && $number % 3 !== 0)
    echo "is prime";
else
echo "not is prime";

}
checkIfPrime($number)
?>
<!-- #Q2 -->
<?php 
echo "<br>";
echo "<br>";
$string ="samer" ;
function revString ($string){
echo strrev($string);


}
revString($string)
?>
<!-- #Q3 -->
<?php 
echo "<br>";
echo "<br>";
$string ="samerR" ;
function checkIfAllStringLower ($string){

if(ctype_lower($string) == 1) // return true
echo ("Your string is OK");
else
echo ("Your string is not OK");



}
checkIfAllStringLower($string)
?>
<!-- #Q4 -->
<?php 
echo "<br>";
echo "<br>";
$num1 =5 ;
$num2 =12 ;
$temp =0 ;
function swap ($num1 ,$num2){
echo "before swap num1 is " . $num1 . " num2 is " . $num2 ;
echo "<br>";
echo "<br>";
$temp = $num1;
$num1 = $num2;
$num2 = $temp;
echo "after swap num1 is " . $num1 . " num2 is " . $num2 ;
}
swap($num1 ,$num2)
?>
<!-- #Q5 -->
<?php 
echo "<br>";
echo "<br>";
// same as prev
?>
<!-- #Q6 -->
<?php 
echo "<br>";
echo "<br>";
$num =407 ;
function checkIfArmStronge ($num){
$check = $num;
    $sum = 0;
    $digit = 0;
    while ($check != 0) {

    $digit =$check % 10;
    $sum +=($digit * $digit *$digit) ;
    $check = $check /10;
    }
   


    if($num == $sum)
        echo "is armStrong";
    else
        echo "is not armStrong";


}
checkIfArmStronge($num)
?>
<!-- #Q7 -->
<?php
echo "<br>";
echo "<br>";
$string = "Eva, can i see bees in cave?";
function isPalindrome($value){
    $cleanValue = strtolower(preg_replace("/[^a-zA-Z0-9\s]/", "", $value));
    
    $pieces = explode(' ', $cleanValue);
    
    $first_word = array_shift($pieces);  
    $last_word = array_pop($pieces);     
    
    $last_word_part = substr($last_word, 1, strlen($first_word));  
    $last_word_part = strtolower($last_word_part);  
    
    $revFirstWord = strrev($first_word);  
    
    echo $last_word_part ;
    echo "<br>";
    echo $revFirstWord ;
    echo "<br>";
    
    if ($last_word_part ==    $revFirstWord) {
        echo "The result is a palindrome!";
    } else {
        echo "The result is not a palindrome.";
    }
}
isPalindrome($string)

?>
<!-- #Q8 -->
<?php 
echo "<br>";
echo "<br>";
$numbers =array(1,1,2,3,3,4,4,5,5,6,7) ;
function removeDup ($num){
    $length = count($num);

for ($i= 0 ; $i < $length; $i++){
    $prevNumber =$num[$i];
    for($j = $i + 1 ; $j <$length ; $j++)
    if($prevNumber == $num[$j]){
        array_splice($num ,$j ,1);
        $i--;
        $length--;
    }
}
print_r($num);
}
removeDup($numbers)
?>

