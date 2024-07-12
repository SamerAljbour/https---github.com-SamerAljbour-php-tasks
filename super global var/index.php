
<!-- #Q1 -->
<?php 

echo "<form method='POST'>
name :<input type='text' name='name'> <br>
email :<input type='text' name='email'><br>
<button type='submit' style = 'margin-left: 45px ;width: 11%' >go</button>
</form>";
$name = $_POST["name"];
$email = $_POST["email"];
echo " the name is $name , the email is $email";
echo "<br>";
echo "<br>";
?>




<!-- #Q2 -->
<?php 
echo "------------------------------------------";
echo "<br>";
echo "<br>";
echo "<form method='GET'>
    <input type='text' name='search'>
    <button type='submit' >go</button>
    </form>";
    $url =$_GET["search"];
    print_r($url);

header("Location:$url"); 
?>
<!-- #Q3 -->
<?php 

echo "------------------------------------------";
echo "<br>";
echo "<br>";
echo "<form method='GET'>
    <input type='text' name='num1'>
    <input type='text' name='op'>
    <input type='text' name='num2'>
    <button type='submit' >go</button>
    </form>";
    $num1 =$_GET["num1"];
    $num2 =$_GET["num2"];
    $op =$_GET["op"];
    $result;
    switch($op){
        case "*":
            $result= $num1 * $num2 ;
            break;
        case "/":
            $result= $num1 / $num2;
            break;
        case "+":
            $result= $num1 + $num2;
            break;
        case "-":
            $result= $num1 - $num2;
            break;
        default :" you inserted wrong opeartion";
    }
echo $result;
echo "<br>";


?>
<!-- #Q4 -->
<?php 

echo "------------------------------------------";
echo "<br>";
echo "<br>";
session_start();
$toDoList = array();
$input = "";
if (!isset($_SESSION['toDoList'])) {
    $_SESSION['toDoList'] = array();
}

$toDoList = $_SESSION['toDoList'];
if (isset($_POST['listItem']) && !empty($_POST['listItem'])) {
    $input = $_POST['listItem'];
    $toDoList[] = $input; 

    $_SESSION['toDoList'] = $toDoList; 
    header("Location: " . $_SERVER['PHP_SELF']);
}

echo "<form method='POST'>
<input type='text' name='listItem'>
<button type='submit' >add</button>
</form>";

print_r ($toDoList);
echo"<div>";
echo "<ul>";
    if(count($toDoList) !== 0)
    for($i = 0 ; $i<count($toDoList) ; $i++){
        echo "<li>$toDoList[$i]</li>";
    }
    echo "</ul>";
    echo "</div>";
    session_write_close();
    // header("Location:http://127.0.0.1/PHP%20tasks/super%20global%20var/index.php/listitem="); 
    ?>
<!-- #Q5 -->
<?php 

echo "------------------------------------------";
echo "<br>";
echo "<br>";
echo 'http://' . $_SERVER['HTTP_HOST'] . '/';  
echo "<br>";
echo  $_SERVER['SCRIPT_NAME'] . '/';  
echo "<br>";    
    
    ?>
<!-- #Q6 -->
<?php 

echo "------------------------------------------";
echo "<br>";
echo "<br>";


echo "<br>";

echo $today = date("H:i:s");
echo "<br>"; 

    
    ?>
<!-- #Q7 -->
<?php
echo "------------------------------------------";
echo "<br>";
echo "<br>";



session_start();

if (!isset($_SESSION["refreshed_round"])) {
    $_SESSION["refreshed_round"] = 0;
}

$_SESSION["refreshed_round"]++;

session_write_close();


echo "User refreshed: " . $_SESSION["refreshed_round"];

echo "<br>";    
echo "<br>";    
?>



<!-- #Q8 -->
<?php
echo "------------------------------------------";
echo "<br>";
echo "<br>";
    $storeviews ="<script>localStorage.getItem('views')||0</script>";
echo $storeviews . "---- ";
$storeviews = intval($storeviews);
$views =$storeviews;

session_start(); // Start or resume the session


if (!isset($_SESSION["views"])) {
    $_SESSION["views"] = 0;
}
$views  +=$_SESSION["views"]++;


echo "User views: " . $views;
session_write_close();
$storeviews += $views;
echo "<br>";
echo "<br>";
?>
<script>
    localStorage.setItem("views",<?php echo  $storeviews;?>);
</script>
<!-- repeate -->
<?php
echo "<script>
var x = Number(localStorage.getItem('views'));
(x) ? localStorage.setItem('views' , x+1) : localStorage.setItem('views' , 1);
</script>";

$views = "<script>document.write(localStorage.getItem('views'));</script>";
echo "User views: " . $views;

?>

<!-- #Q9-->
<?php
echo "------------------------------------------";
echo "<br>";
echo "<br>";


$cookie_name = "user";
// setcookie($cookie_name ,"samer", time() +(86400 + 3600),"/","http://127.0.0.1/PHP%20tasks/super%20global%20var/index.php?listItem=",false,true );

setcookie($cookie_name, "", time() - 1, "/");


setcookie($cookie_name, "samer", time() + 3600, "/"); 


?>





