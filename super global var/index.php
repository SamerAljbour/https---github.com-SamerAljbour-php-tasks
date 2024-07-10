<?php 

echo "<form method='GET'>
name :<input type='text' name='name'> <br>
email :<input type='text' name='email'><br>
<button type='submit' style = 'margin-left: 45px ;width: 11%' >go</button>
</form>";
$name = $_GET["name"];
$email = $_GET["email"];
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
    switch(true){
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
if (isset($_GET['listItem']) && !empty($_GET['listItem'])) {
    $input = $_GET['listItem'];
    $toDoList[] = $input; 

    $_SESSION['toDoList'] = $toDoList; 
}

echo "<form method='GET'>
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
$empty;
$starttime = microtime(true); 
for($i= 0 ; $i<100; $i++)
$empty=0;
$endtime = microtime(true);
echo "<br>";
printf("Page loaded in %f seconds", $endtime - $starttime );
echo "<br>";    
    
    ?>
<!-- #Q7 -->
<?php
echo "------------------------------------------";
echo "<br>";
echo "<br>";

// Set session cookie parameters to expire at the end of the browser session
session_set_cookie_params([
    'lifetime' => 0, // 0 means the cookie expires at the end of the session (browser close)
]);

// Start or resume the session
session_start();

// Initialize the refresh count if not set
if (!isset($_SESSION["refreshed_round"])) {
    $_SESSION["refreshed_round"] = 0;
}

// Increment the refresh count
$_SESSION["refreshed_round"]++;

// Close the session (write session data and close it)
session_write_close();

// Display the refresh count
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
echo "<script>var x = Number(localStorage.getItem('views'));
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
// setcookie($cookie_name ,"samer", time() +(86400 + 3600),"/",
//"http://127.0.0.1/PHP%20tasks/super%20global%20var/index.php?listItem=",false,true );

setcookie($cookie_name, "", time() - 3600, "/");


setcookie($cookie_name, "samer", time() + 3600, "/"); 


?>





