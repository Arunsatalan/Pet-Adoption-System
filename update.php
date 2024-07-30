<?php
header('Content-Type: application/json');

// Enable error reporting (optional, for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the Database class
require_once 'config.php'; // Adjust the path as needed

// Create a new instance of Database and get the connection
$db = new Database();
$conn = $db->getConnection();

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $pet_id = $_POST['pet_id'] ?? '';
    $pet_name = $_POST['pet_name'] ?? '';
    $pet_age = $_POST['pet_age'] ?? '';
    $vaccinate = $_POST['vaccinate'] ?? '';
    $trained = $_POST['trained'] ?? '';
    $category = $_POST['category'] ?? '';
    $breed = $_POST['breed'] ?? '';
    $colour = $_POST['colour'] ?? '';
    $location = $_POST['location'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // Validate pet_id
    if (empty($pet_id) || !is_numeric($pet_id)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid or missing pet_id.'
        ]);
        exit;
    }

    // Prepare SQL statement for update
    $stmt = $conn->prepare("UPDATE pets SET pet_name = ?, pet_age = ?, vaccinate = ?, trained = ?, category = ?, breed = ?, colour = ?, location = ?, email = ?, phone = ? WHERE id = ?");
    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Prepare failed: ' . $conn->error
        ]);
        exit;
    }

    $stmt->bind_param("sissssssssi", $pet_name, $pet_age, $vaccinate, $trained, $category, $breed, $colour, $location, $email, $phone, $pet_id);

    // Execute statement
    if (!$stmt->execute()) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Update failed: ' . $stmt->error
        ]);
    } else {
        echo json_encode([
            'status' => 'success',
            'message' => 'Data updated successfully!',
            'data' => [
                'pet_id' => $pet_id,
                'pet_name' => $pet_name,
                'pet_age' => $pet_age,
                'vaccinate' => $vaccinate,
                'trained' => $trained,
                'category' => $category,
                'breed' => $breed,
                'colour' => $colour,
                'location' => $location,
                'email' => $email,
                'phone' => $phone
            ]
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>
