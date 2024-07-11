<?php
include "config.php";

if($_SERVER ["REQUEST_METHOD"]== "POST"){
    $imageName = $_FILES['image']['name'];
    $imageTempName =$_FILES['image']['tmp_name'];
    $imageUploadFolder = 'C:\xampp\htdocs\PhpProject1\php\Pet-Adoption-System\img/'.$imageName;


    $name = $_POST['name'];
    $type = $_POST['type'];
    $age = $_POST['age'];
    $notes = $_POST['notes'];
    if(move_uploaded_file($imageTempName,$imageUploadFolder)){
        echo "successful add image";
        $sql = "insert into users(id,name,image,type,age,notes) value (null,'$name','$imageTempName','$type','$age','$notes')";

        if($conn->query($sql) ===true){
            echo "Record inserted successfully.";
        } else {
            echo "Error inserting record: " . $conn->error;
        }
        }else {
            echo "Failed to upload image.";
        }
    }
// Fetch all records from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$items = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Return JSON data
header('Content-Type: application/json');
echo json_encode($items);

$conn->close();


?>