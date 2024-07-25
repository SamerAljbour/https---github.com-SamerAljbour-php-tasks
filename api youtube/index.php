<?php
$search = '';
$url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&key=AIzaSyCf-zK2wWIBHVlSvXZRfpYHYjzcW7Mqn0U';

if (isset($_GET['search'])) {
    $search = urlencode($_GET['search']); // URL encode the search query
    $url .= '&q=' . $search; // Append the search query to the URL
}

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
curl_close($curl);

if ($output === false) {
    echo json_encode(["error" => "Failed to fetch data"]);
    exit;
}

$data = json_decode($output, true);
$response = [];

if (isset($data['items'])) {
    foreach ($data['items'] as $video) {
        $response[] = [
            "title" => $video['snippet']['title'],
            "image" => $video['snippet']['thumbnails']['high']['url'], // Get thumbnail URL
            "videoUrl" => 'https://www.youtube.com/watch?v=' . $video['id']['videoId'] // Video URL
        ];
    }
    
    if (empty($response)) {
        echo json_encode(["error" => "No videos found"]);
    } else {
        echo json_encode($response);
    }
} else {
    echo json_encode(["error" => "Invalid API response"]);
}
?>
