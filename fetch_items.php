<?php
require 'config.php';

header('Content-Type: application/json');

class PetFetcher {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function fetchAll() {
        $conn = $this->db->getConnection();
        $sql = "SELECT * FROM pets"; // Replace 'pets' with your table name
        $result = $conn->query($sql);

        $response = array();
        if ($result) {
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $response = array(
                    'status' => 'success',
                    'message' => 'Data fetched successfully.',
                    'data' => $data
                );
            } else {
                $response = array(
                    'status' => 'success',
                    'message' => 'No data found.',
                    'data' => array()
                );
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error fetching data: ' . $conn->error,
                'data' => array()
            );
        }

        echo json_encode($response);
    }
}

$fetcher = new PetFetcher();
$fetcher->fetchAll();
?>
