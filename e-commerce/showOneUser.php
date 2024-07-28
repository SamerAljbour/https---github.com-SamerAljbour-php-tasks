<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="./showOneUser.php">

        <input type="text" name="id">
        <button type="submit"> submit</button>
    </form>
</body>
</html>
<?php 
$id;    
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else $id = '';
$url = 'http://127.0.0.1/PHP%20tasks/e-commerce/getAllUser.php?id='.$id;
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($curl);
curl_close($curl);
$result = json_decode($output,true);
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead><tr><th>ID</th><th>Email</th><th>Password</th></tr></thead>";
echo "<tbody>";
foreach($result as $row){

    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
