<?php

    $tableName = $_GET['tableName'];
    // Assuming you have already connected to your MySQL database
    include("database.php");

    // Query to fetch data
    $sql = "SELECT company, position FROM $tableName";
    $result = $conn->query($sql);

    // Initialize arrays to store statistics
    $companyStats = [];
    $positionStats = [];
    $pattern = '/[^\w\s]/u';
    // Process query results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Count companies
            $company = $row['company'];
            if(preg_match($pattern, $company))
            {
                $company = preg_replace($pattern, '-', $company);
            }
            if($company == '')
            {
                $company = "No name";
            }
            if (isset($companyStats[$company])) {
                $companyStats[$company]++;
            } else {
                $companyStats[$company] = 1;
            }

            // Count positions
            $position = $row['position'];
            if(preg_match($pattern, $position))
            {
                $position = preg_replace($pattern, '-', $position);
            }
            if($position == '')
            {
                $position = "No name";
            }
            if (isset($positionStats[$position])) {
                $positionStats[$position]++;
            } else {
                $positionStats[$position] = 1;
            }
        }
    }

    // Close MySQL connection
    $conn->close();

    // Sort company statistics in descending order
    arsort($companyStats);

    // Get top 20 companies
    $topCompanies = array_slice($companyStats, 0, 15);

    // Sort position statistics in descending order
    arsort($positionStats);

    // Get top 20 positions
    $topPositions = array_slice($positionStats, 0, 15);

    //print_r($positionStats);

    // Convert arrays to JSON format
    $topCompanies = json_encode($topCompanies);
    $topPositions = json_encode($topPositions);

    // URL to which you want to send the arrays
    $url = '../index?dataExists=true&topCompanies=' . $topCompanies . '&topPositions=' . $topPositions;
    // Redirect to the URL
    header('Location: ' . $url);
    exit;
?>