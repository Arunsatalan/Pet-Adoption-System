<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['image'])) {
        $imageName = $_FILES['image']['name'];
        $imageTempName = $_FILES['image']['tmp_name'];
        $imageUploadFolder = 'img/' . $imageName;

        $name = $_POST['name'];
        $type = $_POST['type'];
        $age = $_POST['age'];
        $notes = $_POST['notes'];

        if (move_uploaded_file($imageTempName, $imageUploadFolder)) {
            $sql = "INSERT INTO users (name, image, type, age, notes) VALUES ('$name', '$imageName', '$type', '$age', '$notes')";
            if ($conn->query($sql) === true) {
                echo json_encode(['status' => 'success', 'message' => 'Record inserted successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error inserting record: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
        }
    }
} elseif (isset($_GET['fetch'])) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $items = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($items);
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    parse_str(file_get_contents("php://input"), $data);
    $id = $data['id'];
    
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === true) {
        echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error deleting record: ' . $conn->error]);
    }
}

$conn->close();
?>
