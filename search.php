<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "video_database";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

if ($search_query) {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM videos WHERE title LIKE ? OR description LIKE ?");
    $search_term = "%" . $search_query . "%";
    $stmt->bind_param("ss", $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch and display the results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }

    $stmt->close();
}

$conn->close();
?>