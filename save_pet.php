<?php
session_start();
include 'DbConnector.php'; // Include the DbConnector class

// Set a dummy session email for testing
$_SESSION['email'] = 'dummy@example.com';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    die("ERROR: User is not logged in.");
}

$sessionEmail = $_SESSION['email'];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petName = $_POST['pet_name'];
    $petAge = $_POST['pet_age'];
    $vaccinate = $_POST['vaccinate'];
    $trained = $_POST['trained'];
    $category = $_POST['category'];
    $breed = $_POST['breed'];
    $colour = $_POST['colour'];
    $location = $_POST['location'];
    $formEmail = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if image file is an actual image or fake image
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["pet_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_types)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
            // Get database connection
            $db = new DbConnector();
            $conn = $db->getConnection();

            // Prepare an insert statement
            $sql = "INSERT INTO pets (session_email, pet_name, pet_age, vaccinate, trained, category, breed, colour, location, form_email, phone, pet_image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = $conn->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(1, $sessionEmail);
                $stmt->bindParam(2, $petName);
                $stmt->bindParam(3, $petAge);
                $stmt->bindParam(4, $vaccinate);
                $stmt->bindParam(5, $trained);
                $stmt->bindParam(6, $category);
                $stmt->bindParam(7, $breed);
                $stmt->bindParam(8, $colour);
                $stmt->bindParam(9, $location);
                $stmt->bindParam(10, $formEmail);
                $stmt->bindParam(11, $phone);
                $stmt->bindParam(12, $target_file);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    echo "Pet details saved successfully.";
                } else {
                    echo "ERROR: Could not execute query: $sql. " . $conn->errorInfo();
                }

                // Close statement
                $stmt = null;
            } else {
                echo "ERROR: Could not prepare query: $sql. " . $conn->errorInfo();
            }

            // Close connection
            $conn = null;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
