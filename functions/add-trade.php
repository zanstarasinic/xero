<?php
require_once "../models/UserDB.php";
require_once "../models/TradeDB.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form has been submitted    
    try {
        $list_id = $_POST['list_id'];
        $pair = $_POST['pair'];
        $date = $_POST['date'];
        $direction = $_POST['direction'];
        $type = $_POST['type'];
        $stop_loss = $_POST['stop_loss'];
        $result = $_POST['result'];
        $roi = $_POST['roi'];

        $result = TradeDB::insert($_SESSION['user_id'], $list_id, $pair, $date, $direction, $type, $stop_loss, $result, $roi);
        ob_start();
        var_dump($result);
        $output = ob_get_clean();
        file_put_contents('output.log', $output);
        if (!$result) {
            // Error saving the data
            error_log('Error saving data.');
            $response = array('success' => false, 'message' => 'Error saving data.');
        } else {
            // Success
            $response = array('success' => true);
        }
    }
    catch (Exception $e) {
        var_dump($e);
    header("Location: ../register.php");
    echo "404 Error - Page Not Found";
    }


    
}
else {
    header("HTTP/1.0 404 Not Found");
echo "404 Error - Page Not Found";
}
?>