<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php'; // Include the database class

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']); // Get the ID from the POST data

    if ($id > 0) {
        $db = new Database();
        $conn = $db->getConnection();

        // Fetch the image filename associated with the ID
        $stmt = $conn->prepare("SELECT pet_image FROM pets WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($pet_image);
        $stmt->fetch();
        $stmt->close();

        // Delete the image file from the server
        if ($pet_image) {
            $file_path = 'img/' . $pet_image;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM pets WHERE id = ?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Item deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete item.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid ID.']);
    }
}
?>
