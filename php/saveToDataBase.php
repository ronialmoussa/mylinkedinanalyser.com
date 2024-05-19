<?php
include("database.php");

$fileName = $_GET['fileName'];
$newFileName = substr($fileName, 0, strpos($fileName, ".")); 

$targetFile = $_GET['targetFile'];

echo $newFileName ;
// sql to create table
$sql = "CREATE TABLE $newFileName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_Name VARCHAR(50) NOT NULL,
    last_Name VARCHAR(50) NOT NULL,
    URL VARCHAR(255),
    email_Address VARCHAR(100),
    company VARCHAR(100),
    position VARCHAR(50),
    connected_On DATE
    )";
    
if ($conn->query($sql) === TRUE) {
    echo "Table ".$newFileName." created successfully";
} 
else {
    echo "Error creating table: " . $conn->error;
}


$excelData = array();
$row = 1;
if (($handle = fopen($targetFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
          if($row > 5){
            $excelData[] = $data[$c];
          }
        }
    }
    fclose($handle);
}
$sql = '';
$arrayLength = count($excelData);
$tempArray = array();
for ($i = 0; $i < $arrayLength; $i++) {
    $tempArray[] = $excelData[$i];
    if(count($tempArray) == 7){
        $dateString = $tempArray[6];
        $timestamp = strtotime($dateString);
        if ($timestamp !== false) {
            $mysqlDate = date("Y-m-d", $timestamp);
            // Escape special characters in values
            $tempArray = array_map(function($value) use ($conn) {
                return mysqli_real_escape_string($conn, $value);
            }, $tempArray);
            $sql .= "INSERT INTO $newFileName (first_Name, last_Name, URL, email_Address, company, position, connected_On)
            VALUES ('$tempArray[0]','$tempArray[1]','$tempArray[2]','$tempArray[3]','$tempArray[4]','$tempArray[5]','$mysqlDate');";
            $tempArray = array();
        } else {
            echo "Error: Invalid date format for row " . ($i + 1) . "<br>";
            // You may choose to handle this error differently, like skipping the insertion for this row.
        }
    }
}

if ($conn->multi_query($sql) === TRUE) 
{
    do {
        /* store first result set */
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    header("Location: getTableInfo.php?tableName=".$newFileName);
} 
else {    
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>