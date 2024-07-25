<?php

$curl = curl_init();
$url = 'https://pokeapi.co/api/v2/pokemon';
if(isset($_GET["name"]))
$name = $_GET["name"];
else $name ="";
curl_setopt($curl, CURLOPT_URL, $url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$output = curl_exec($curl);
// curl_exec($curl);
if ($output === false) {
    echo json_encode(["error" => "Failed to fetch data"]);
    exit;
}
curl_close($curl);
$data= (json_decode($output ,true));
$response= [];
if(isset($data['results'])){
// print_r($data['results']);
foreach($data['results'] as $row){
    if( stripos( $row['name'],$name)  === 0){
        $pokemonCurl = curl_init();
        curl_setopt($pokemonCurl, CURLOPT_URL, $row['url']);
        curl_setopt($pokemonCurl, CURLOPT_RETURNTRANSFER, 1);
        $pokemonOutput = curl_exec($pokemonCurl);
        curl_close($pokemonCurl);
        if($pokemonOutput != false){
            $pokemonData = json_decode($pokemonOutput, true); // Decodes JSON into an associative array
            $response[] = [
                "name" => $row['name'],
                "image" => $pokemonData['sprites']['front_default']
            ];
        }
    }
    // $response[]= $row['name'] . "  ";
    
}
if(empty($response)){
    echo json_encode(["error" => "no pokemon"]);
}else {
    echo json_encode($response);
}


}
else {
    echo json_encode(["error" => "Invalid API response"]);
}
?>