<?php
// Connect to your database (assuming you're using mysqli)
include('auth_session.php');
require('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the event ID and rating from the form
    $eventId = $_POST['event_id'];
    $rating = $_POST['rating'];

    // Validate and sanitize inputs (to prevent SQL injection)
    $eventId = mysqli_real_escape_string($con, $eventId);
    $rating = mysqli_real_escape_string($con, $rating);

    // Check if the user has already rated this event
    $userId = $_SESSION['id']; // Assuming you have user session data
    $checkQuery = "SELECT * FROM event_ratings WHERE event_id = $eventId AND user_id = $userId";
    $result = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        // User has already rated this event, you can handle this case as needed
        // For example, update the existing rating or show an error message
    } else {
        // Insert the new rating into your database
        $insertQuery = "INSERT INTO event_ratings (event_id, user_id, rating) VALUES ('$eventId', '$userId', '$rating')";
        if (mysqli_query($con, $insertQuery)) {
            // Rating successfully added
            // You can redirect back to the feed page or do something else
            header("Location: feed.php");
            exit();
        } else {
            // Handle the case where the insertion fails
            echo "Error: " . mysqli_error($con);
        }
    }
} else {
    // Handle cases where the request method is not POST
    // For example, redirect back to the feed page with an error message
    header("Location: feed.php?error=invalid_request");
    exit();
}
?>
