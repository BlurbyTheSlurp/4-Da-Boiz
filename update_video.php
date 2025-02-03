<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "video_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the video ID from the request
$video_id = isset($_POST['video_id']) ? $_POST['video_id'] : '';

if ($video_id) {
    // Update the watch count
    $stmt = $conn->prepare("UPDATE videos SET watch_count = watch_count + 1 WHERE id = ?");
    $stmt->bind_param("i", $video_id);
    $stmt->execute();

    // Get the updated watch count and upload time
    $stmt = $conn->prepare("SELECT watch_count, upload_time FROM videos WHERE id = ?");
    $stmt->bind_param("i", $video_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $video = $result->fetch_assoc();

    // Calculate the time since the video was uploaded
    $upload_time = new DateTime($video['upload_time']);
    $current_time = new DateTime();
    $interval = $upload_time->diff($current_time);
    $time_since_upload = $interval->format('%a days, %h hours, %i minutes ago');

    // Return the updated data as JSON
    echo json_encode([
        'watch_count' => $video['watch_count'],
        'time_since_upload' => $time_since_upload
    ]);
}

$conn->close();
?>