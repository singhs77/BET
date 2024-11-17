<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Move the uploaded file to the server
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            echo "File successfully uploaded.";
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "No file was uploaded or there was an error.";
    }
} else {
    echo "Invalid request method.";
}
?>
