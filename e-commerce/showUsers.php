<?php 
$url = 'http://127.0.0.1/PHP%20tasks/e-commerce/allUsers.php';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);

if ($output === false) {
    echo json_encode(["error" => "Failed to fetch data"]);
    exit;
}

// Decode the JSON response
$data = json_decode($output, true);

// Check for JSON decoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["error" => "JSON decoding error: " . json_last_error_msg()]);
    exit;
}

// Output data in table format
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<thead><tr><th>ID</th><th>Email</th><th>Password</th></tr></thead>";
echo "<tbody>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
