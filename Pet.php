<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database class and other necessary files
require 'config.php'; // Include the database class

class PetFormHandler {
    private $db;
    private $pet_name;
    private $pet_age;
    private $vaccinate;
    private $trained;
    private $category;
    private $breed;
    private $colour;
    private $location;
    private $email;
    private $phone;
    private $file_uploaded = false;
    private $file_name;

    public function __construct($postData, $fileData) {
        $this->db = new Database();
        $this->pet_name = htmlspecialchars(trim($postData['pet_name']));
        $this->pet_age = htmlspecialchars(trim($postData['pet_age']));
        $this->vaccinate = htmlspecialchars(trim($postData['vaccinate']));
        $this->trained = htmlspecialchars(trim($postData['trained']));
        $this->category = htmlspecialchars(trim($postData['category']));
        $this->breed = htmlspecialchars(trim($postData['breed']));
        $this->colour = htmlspecialchars(trim($postData['colour']));
        $this->location = htmlspecialchars(trim($postData['location']));
        $this->email = htmlspecialchars(trim($postData['email']));
        $this->phone = htmlspecialchars(trim($postData['phone']));
        $this->handleFileUpload($fileData);
        $this->saveToDatabase();
    }

    private function handleFileUpload($fileData) {
        if (isset($fileData['pet_image']) && $fileData['pet_image']['error'] == UPLOAD_ERR_OK) {
            $file_tmp = $fileData['pet_image']['tmp_name'];
            $this->file_name = basename($fileData['pet_image']['name']);
            $file_path = 'img/' . $this->file_name;

            $allowed_types = ['image/jpeg', 'image/png'];
            if (in_array($fileData['pet_image']['type'], $allowed_types) && $fileData['pet_image']['size'] < 5000000) {
                if (move_uploaded_file($file_tmp, $file_path)) {
                    $this->file_uploaded = true;
                } else {
                    die('File upload failed.');
                }
            } else {
                die('Invalid file type or size.');
            }
        }
    }

    private function saveToDatabase() {
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("INSERT INTO pets (pet_name, pet_age, vaccinate, trained, category, breed, colour, location, email, phone, pet_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $pet_image = $this->file_uploaded ? $this->file_name : null;
        $stmt->bind_param('sssssssssss', $this->pet_name, $this->pet_age, $this->vaccinate, $this->trained, $this->category, $this->breed, $this->colour, $this->location, $this->email, $this->phone, $pet_image);

        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }

        $stmt->close();

        // Redirect after successful database operation
        header('Location: index.php');
        exit(); // Ensure no further code is executed after redirect
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    new PetFormHandler($_POST, $_FILES);
}
?>
