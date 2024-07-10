<?php
echo "hello world";
?>
<!-- #Q1 -->
<!-- # convert string to upper case -->
 <?php
 echo "<br>";
 echo "<br>";
 $string = "hello world";
 echo strtoupper($string);
 ?>
 <!-- # convert string to lower case -->
 <?php
 echo "<br>";
 echo "<br>";
 $string = "HELLO WORLD";
 echo strtolower($string);
 ?>
 <!-- first letter capital in each word -->
 <?php
 echo "<br>";
 echo "<br>";
 $string = "hello world , i love php";
 echo ucwords($string);
 ?>
 <!-- #Q2 -->
  <!-- split to a date formate -->
  <?php
 echo "<br>";
 echo "<br>";
 $date = "085119";
$time = DateTime::createFromFormat("His" , $date);
$formatedData = $time->format("H:i:s"); // -> used for access properties of an object.
echo $formatedData;
 ?>
 <!-- #Q3 -->
 <?php
 echo "<br>";
 echo "<br>";
    $text = "i am full stack developer at orange academy";
    $input = "am";
    if ( strpos($text , $input) !== false){
        echo "word found";
    }
 ?>
 <!-- #Q4 -->
 <?php
 echo "<br>";
 echo "<br>";
    $fileName = "www.orange.com/index.php";
   echo basename($fileName)
 ?>
 <!-- #Q5 -->
 <?php
 echo "<br>";
 echo "<br>";
    $email = "samer@gmail.com";
   echo strstr($email , "@" ,true) // if we put it to flase will return ----> @gmail.com
 ?>
 <!-- #Q6 -->
 <?php
 echo "<br>";
 echo "<br>";
 $data = "samer@gmail.com";
   echo substr ($data ,-3)
 ?>
 <!-- #Q7 -->
 <?php
 echo "<br>";
 echo "<br>";
 $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
   echo substr (str_shuffle($data) ,0 ,10)
 ?>
 <!-- #Q8 -->
  <?php
  
  echo "<br>";
  echo "<br>";
$text = "Hello world, how are you?";
    echo preg_replace("/^\w+/" , "HI" ,$text );
  
  ?>
  
 <!-- #Q9 -->
  <?php
  
  echo "<br>";
  echo "<br>";
$str1 ="dragonball";
$str2 ="dragonboll";
echo strspn( $str1 ^ $str2 ,"\0")
//   study it
  ?>
 <!-- #Q10 -->
  <?php
  
  echo "<br>";
  echo "<br>";
$str1 ="Twinkle, twinkle , little star.";
echo var_dump(explode(" ", $str1))
  ?>
  
 <!-- #Q11 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "c";
  echo ++$str;
  ?>
  
 <!-- #Q12 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "the brown fox";
  $wantedToInsert = " quick";

  echo substr($str , 0,3) . $wantedToInsert . substr($str ,3);
  ?>
  
  
 <!-- #Q13 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "000657022.24";
    
  echo  str_replace("0" ,"",$str) ;
  ?>
  
 <!-- #Q14 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "the brown fox jumps over the lazy dog";
    
  echo  str_replace("fox" ,"",$str) ;
  ?>
 <!-- #Q15 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "the brown fox jumps over the lazy dog----";
    
  echo  rtrim($str,"-") ;
  // echo  str_replace("-" ,"",$str) ;
  ?>
 <!-- #Q16 -->
  <?php
  
  echo "<br>";
  echo "<br>";

  $str = "\"\1+2/3*2:2-3/4*3";
    
  echo  preg_replace('/[^0-9]/' , "" , $str);

  ?>
 <!-- #Q17 -->
  <?php
  
  echo "<br>";
  echo "<br>";
  $str = "the brown fox jumps over the lazy dog";


  $pieces = explode(" ", $str);
  $first_part = implode(" ", array_splice($pieces, 0, 5));
  $other_part = implode(" ", array_splice($pieces, 5));
  echo   $first_part;
  ?>
  <?php
  
  echo "<br>";
  echo "<br>";
  $str = "the brown fox jumps over the lazy dog";


  $pieces = explode(" ", $str);
  $first_part = implode(" ", array_splice($pieces, 0, 1));
  $other_part = implode(" ", array_splice($pieces, 1));
  echo   $first_part;
  ?>
  
 <!-- #Q18 -->
 <?php
   echo "<br>";
   echo "<br>";
   $str ="2,543.21";
   echo str_replace("," , "", $str)

?>
  
 <!-- #Q19 -->
 <?php
   echo "<br>";
   echo "<br>";
for ($x = ord('a'); $x <= ord('z'); $x++) 
 echo chr($x);
?>
