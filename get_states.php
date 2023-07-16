<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['country_id'])) {
    $countryID = $_POST['country_id'];

    // Prepare and execute SQL query to fetch states based on the country ID
    $stmt = $conn->prepare('SELECT * FROM `state` WHERE country_id= ?');
    $stmt->bind_param('i', $countryID);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate the HTML options for states
    $options = '<option value="">Select State</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
    }

    echo $options;
}
