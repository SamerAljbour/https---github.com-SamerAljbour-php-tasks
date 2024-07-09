<!-- #Q1 -->
<?php 
for ($i = 0 ; $i <=10 ; $i++){
    if ($i == 10)
        echo $i ;
    else    
        echo $i ." - ";
}
?>
<!-- #Q2 -->
<?php 
echo "<br>";
echo "<br>";
$sum = 0;
for ($i = 1 ; $i <30 ; $i++){
    $sum += $i;
}
echo $sum;
?>
<!-- #Q3 -->

<?php
echo "<br>";
echo "<br>";

$n = 5;


for ($i = 0; $i < $n; $i++) {

    for ($j = 0; $j < $n; $j++) {
        if ($j < $n - $i - 1) {  
            echo 'A ';
        } else {
            echo chr(65 + $i) . ' ';
        }
    }
    
    echo "<br>";
}

// <!-- #Q4 -->

?>
<?php
echo "<br>";
echo "<br>";

$n = 5;


for ($i = 0; $i < $n; $i++) {
   
    for ($j = 0; $j < $n; $j++) {
        if ($j < $n - $i - 1) {
            echo '1 ';
        } else {
            echo chr(49  + $i) . ' ';
        }
    }
    
    echo "<br>";
}
?>
 <!-- #Q5 -->


<?php
echo "<br>";
echo "<br>";

$n = 5;


for ($i = 0; $i < $n; $i++) {
   
    for ($j = 0; $j < $n; $j++) {
        if ($j == $i) {
            echo chr(49  + $i) . ' ';
        } 
        else
        echo 0 . ' ';
        
    }
    
    echo "<br>";
}
?>
 <!-- #Q6 -->


<?php
echo "<br>";
echo "<br>";

$sum = 1;


for ($i = 1; $i <= 5; $i++) {
    $sum *=$i;
   
    
}
echo $sum;
echo "<br>";
?>
 <!-- #Q7 -->


<?php
echo "<br>";
echo "<br>";

$prevNumber = 0;
$currnetNumber = 1;
$temp =0;

for ($i = 0; $i <= 8; $i++) {
    echo $prevNumber . " ";
    $temp = $currnetNumber;
     $currnetNumber += $prevNumber;
     $prevNumber = $temp;
   
}
echo "<br>";
?>
 <!-- #Q8 -->


<?php
echo "<br>";
echo "<br>";


echo substr_count(strtolower("Orange Coding Academy"),"c");

echo "<br>";
?>
 <!-- #Q9 -->


<?php
echo "<br>";
echo "<br>";
for($i =1 ; $i <= 6 ; $i++){
    echo "<table border =1px  cellpadding=3px>";
    echo "<tr>";
    for($j=1 ; $j<=5 ; $j++){
        
        echo "<td>" .   $i ."*". $j ."=". $i*$j ."</td>";
       
    }
    echo "</tr>";
    echo "</table>";
    
}
echo "<br>";
?>
 <!-- #Q10 -->


<?php
echo "<br>";
echo "<br>";
for($i =1 ; $i <= 50 ; $i++){
    if ( $i % 3 == 0){
        echo "Fizz ";   
        if( $i % 5 == 0 && $i % 3 == 0)
        echo "FizzBuzz ";
    }
    else if ($i % 5 == 0)
        echo  "Buzz ";  
    else
        echo $i . " ";  

}
echo "<br>";
?>
 <!-- #Q11 -->


<?php
echo "<br>";
echo "<br>";
$counter = 1;
for($i =0 ; $i <= 5 ; $i++){
    echo "<br>";
    for($j=0 ; $j < $i ;$j++) {
        echo $counter++ . " ";
    }
}
echo "<br>";
echo "<br>";
echo "<br>";
?>
 <!-- #Q12 -->

 <?php
$rows = 5;
function generateSpiralPattern($rows) {
    
        
        for ($i = 2; $i <= $rows; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo chr($j + 64); 
                if ($j < $i) {
                    echo " "; 
                }
            }
            echo "<br>"; 
        }
        
    for ($i = $rows; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo chr($j + 64); 
            if ($j < $i) {
                echo " "; 
            }
        }
        echo "<br>"; 
    }
    }
    


generateSpiralPattern($rows);

?>


