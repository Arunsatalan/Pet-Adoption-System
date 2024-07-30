<?php
require 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = new Database();
    $conn = $db->getConnection();

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid ID provided.']);
        exit;
    }

    $sql = "SELECT * FROM pets WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
        exit;
    }

    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'data' => $item]);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
