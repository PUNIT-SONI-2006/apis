<?php
header('Content-Type:application/json');    
if(isset($_GET)){
    $conn = new mysqli("hostname", "username", "password", "database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name=mysqli_real_escape_string($conn,$_GET['name']);
$email=mysqli_real_escape_string($conn,$_GET['email']);
$mobno=mysqli_real_escape_string($conn,$_GET['mobno']);

$sql=mysqli_query($conn,"INSERT INTO table (name, email, mobno) VALUES ('$name', '$email', '$mobno')");
if (mysqli_query($conn, $sql)) {
    echo json_encode(array('success' => 'Data inserted successfully.'));
} else {
    echo json_encode(array('error' => 'Error inserting data: ' . mysqli_error($conn)));
}
$conn->close();
}else {
    header('HTTP/1.1 403 Forbidden');
    echo json_encode(array('error'=>'You are not allowed here.'));
}
?>