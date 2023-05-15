<?php
require_once "../models/UserDB.php";
require_once "../models/TradeDB.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Form has been submitted    
    try {
        $list_id = $_GET['list_id'];
        $result = TradeDB::getAll($_SESSION['user_id'], $list_id);
        
        if (!$result) {
            // Error saving the data
            error_log('Error saving data.');
            $data = array(
                'success' => false,
                'message' => 'Data retrieved failed.',
                'data' => array(
                    $result
                )
            );
            echo json_encode($data);
        } else {
            $data = array(
                'success' => true,
                'message' => 'Data retrieved successfully.',
                'data' => array(
                    $result
                )
            );
            echo json_encode($data);
            
        }
    }
    catch (Exception $e) {
        var_dump($e);
    header("Location: ../register.php");
    echo "301 Error - Permantly Moved";
    }


    
}
else {
    header("HTTP/1.0 404 Not Found");
echo "404 Error - Page Not Found";
}
?>