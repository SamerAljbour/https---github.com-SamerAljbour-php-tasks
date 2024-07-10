<!-- #Q1 -->
<?php 
$string = "The memory of that scene for me is like a frame of film forever frozen at that moment: the red
carpet, the green lawn, the white house, the leaden sky. The new president and his first lady. -
Richard M. Nixon";

$colors = array('white', 'green', 'red');

    echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the $colors[2] <br>
carpet, the $colors[1] lawn, the $colors[0] house, the leaden sky. The new president and his first lady. -
Richard M. Nixon";

echo "<br>";
echo "<br>";
?>
<!-- #Q2 -->
<?php 
$colors = array('white', 'green', 'red');
echo "<ul>";
echo "<li>". $colors [0] ."</li>";
echo "<li>". $colors [1] ."</li>";
echo "<li>". $colors [2] ."</li>";
echo "</ul>";
echo "<br>";
echo "<br>";
?>

<!-- #Q3 -->
<?php 
$cities= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels",
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" =>
"Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon",
"Spain"=>"Madrid" );
foreach ( $cities as $counteryName => $Captial){ //counteryName ---> hold key     Captial-------> hold value
    echo "$counteryName  :  $Captial <br>";
}

echo "<br>";
echo "<br>";
?>

<!-- #Q4 -->
<?php 
$color = array (4 => 'white', 6 => 'green', 11=> 'red');

echo $color[4];
echo "<br>";
echo "<br>";
?>

<!-- #Q5 -->
<?php 
$numbers = array (1,2,3,4,5);
$numbersModfied =array ();
$location = 4;
$input = "$";

for($i = 0 ; $i< count($numbers) ; $i++){
    if($i == $location -1){

    array_push($numbersModfied,$input);
        
    }
    array_push($numbersModfied,$numbers[$i]);
}
echo print_r($numbersModfied);


echo "<br>";
echo "<br>";
?>

<!-- #Q6 -->
<?php 
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
$numbersSorted =arsort($fruits );
//change key

echo "<br>";
echo "<br>";
?>

<!-- #Q7 -->
<?php 
echo "<br>";
echo "<br>";
$temp =array (78, 60, 62, 68, 71, 68, 73, 85 ,66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62,
65, 64, 68, 73, 75, 79, 73);
$tempMin = $temp;
$tempMax = $temp;

$max = -999;
$avgOfTemp = 0;
$sortedTemp = array ();
$length=count($tempMax);
$maxFive;
$minFive;
for($i = 0 ; $i< 5 ; $i++){

    $maxIndex = -1;
    $maxValue = -999;
    for($j = 0; $j < $length ; $j++){
        if ($tempMax[$j] > $maxValue) {
            $maxValue = $tempMax[$j];
            $maxIndex = $j;
        }
    }
    $maxFive[] = $maxValue;
    $tempMax[$maxIndex] = -999; 
    }
    echo "Top 5 Highest Temperatures: " . implode(", ", $maxFive) . "<br>";

for($i =0 ; $i <5;$i++){
    $minIndex = -1;
    $minValue = 999;
    for($j=0 ; $j < $length ; $j++){
        if($tempMin[$j] < $minValue){
            $minValue =$tempMin[$j];
            $minIndex = $j;
        }
    }
    $minFive[]= $minValue;
    $tempMin [$minIndex] = 999;
}
echo "least 5 Temperatures: " . implode(", ", $minFive) . "<br>";
echo "<br>";
echo "<br>";
?>
<!-- #Q8 -->
<?php 
//retype it manually
echo "<br>";
echo "<br>";
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$newArray = array();
print_r (array_merge($array1 , $array2));

echo "<br>";
echo "<br>";
?>
<!-- #Q9 -->
<?php 
echo "<br>";
echo "<br>";
$colors = array("red","blue", "white","yellow");
foreach ($colors as $key => $value){
    $colors[$key] = strtoupper($value);
}
// for ( $i = 0 ; $i< count($colors) ; $i++){
//     $colors [$i] =strtoupper($colors[$i]);
// }
print_r ($colors);
echo "<br>";
echo "<br>";
?>
<!-- #Q10 -->
<?php 
echo "<br>";
echo "<br>";
$colors = array("RED","BLUE", "WHITE","YELLOW");
// foreach ($colors as $key => $value){
//     $colors[$key] = strtolower($value);
// }
for ( $i = 0 ; $i< count($colors) ; $i++){
    $colors [$i] =strtolower($colors[$i]);
}
print_r ($colors);
echo "<br>";
echo "<br>";
?>
<!-- #Q11 -->
<?php 
echo "<br>";
echo "<br>";
for($i=200 ; $i < 250 ;$i++){
    if($i % 4 == 0)
    echo $i . " ";
}
echo "<br>";
echo "<br>";
?>
<!-- #Q12 -->
<?php 
echo "<br>";
echo "<br>";
$longestStr =-1;
$shortestStr = 99999;
$words = array("abcd","abc","de","hjjj","g","wer");
foreach ( $words as $key => $value){
    if(strlen($value) > $longestStr){
        $longestStr =strlen($value);
    }
    if(strlen($value) < $shortestStr){
        $shortestStr =strlen($value);
    }
}
echo $longestStr;
echo "<br>";
echo $shortestStr;
echo "<br>";
echo "<br>";
?>
<!-- #Q13 -->
<?php 
echo "<br>";
echo "<br>";
$current;
$array = array();
for($i= 0 ; $i < 10 ; $i++){
    $current =rand(11,20);
    $array[] = $current;
    for($j = 0 ; $j < count($array)  ; $j++)
    if($array[$i] !== $current)
    $array[]= $current;
}
print_r($array);
echo "<br>";
echo "<br>";
?>
<!-- #Q14 -->
<?php 
echo "<br>";
echo "<br>";
$min = 10000;
$array1 = array( 2, 0, 10, 12, 6);
foreach ($array1 as $key => $value){
    if($value === 0)
    continue;
    if($value < $min)
    $min =$value;
}
echo $min;
echo "<br>";
echo "<br>";
?>
<!-- #Q15 -->
<?php 
echo "<br>";
echo "<br>";
$min = 10000;
$unSortedArray = array( 2, 0, 10, 12, 6 ,3,1,7);
$sortedArray = array();
$length = count($unSortedArray);
for($i = 0 ; $i< $length ; $i++){
    $maxValue =-9999;
    $maxIndex = -1;
    for($j=0 ; $j< $length ; $j++){
        if ($unSortedArray[$j] > $maxValue){
            $maxValue = $unSortedArray[$j] ;
            $maxIndex = $j;
        }
    }
    $sortedArray[]= $maxValue;
    $unSortedArray[$maxIndex] = -1;

}
print_r ($sortedArray);
echo "<br>";
echo "<br>";
?>
<!-- #Q16 -->
<?php 
echo "<br>";
echo "<br>";
$number =1.1555;
$number = strval($number);
$number = str_split($number);
$newNumber =array();
function floorNumber($number , $prec , $sep){
for($i = 0 ; $i < count($number)  ;$i++){
    if(is_numeric($number[$i])){
        $number[$i] = $sep;
        break;
    }
    
}
for($i=0 ; $i < count($number) - $prec; $i++){
    $newNumber[$i] = $number[$i];
}
echo "the array --->";
echo implode("" ,$newNumber);
// print_r($newNumber);
}
floorNumber($number , 2,".");
echo "<br>";
echo "<br>";
?>
<!-- #Q17 -->
<?php 
echo "<br>";
echo "<br>";
$list1 = "4, 5, 6, 7";
$list2 = "4, 5, 7, 8";
$array1 = explode(", " , $list1);
$array2 = explode(", " , $list2);
$mregedArray =array();
$length = count($array1) + count($array2); 
for($i = 0 ; $i < count($array1)  ; $i++){
    $mregedArray[] = $array1[$i];
}
for($i = 0 ; $i < count($array2)  ; $i++){
    $mregedArray[] = $array2[$i];
}
function removeDup($array){
    $length = count($array);
    for($i= 0 ; $i<$length ; $i++){
        
        for($j= $i + 1 ; $j< $length; $j++){
            if($array[$i] == $array[$j]){
                array_splice($array , $j ,1);
                $length--;

            }

        }
    }
    print_r($array);
}

removeDup($mregedArray);



echo "<br>";
echo "<br>";
?>
<!-- #Q18 -->
<?php 
echo "<br>";
echo "<br>";
$array=array(4, 5, 6, 7, 4, 7, 8);


removeDup($array);



echo "<br>";
echo "<br>";
?>
<!-- #Q19 -->
<?php 
echo "<br>";
echo "<br>";
$array1 = array('a','1','2','3','4');
$array2 = array('a','3');
$found = array ();

for($i = 0 ; $i < count($array2) ;$i++){

    for($j = 0 ; $j < count($array1) ;$j++){
        if($array2[$i] == $array1[$j]){
            $found[] = $array1[$j];
        }
    }
}
if(count($found) === count($array2)){
    echo "array2 is a subset array from array1";
}
else
echo "array2 is not a subset array from array1";






echo "<br>";
echo "<br>";
?>