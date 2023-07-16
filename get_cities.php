<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['state_id'])) {
    $stateID = $_POST['state_id'];

    // Prepare and execute SQL query to fetch cities based on the state ID
    $stmt = $conn->prepare('SELECT * FROM city WHERE state_id = ?');
    $stmt->bind_param('i', $stateID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate the HTML options for cities
    $options = '<option value="">Select City</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
    }

    echo $options;
}
