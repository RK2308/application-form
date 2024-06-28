<?php
$name = $_POST['name'];
$photo =$_POST['photo'];
$email = $_POST['email'];
$number = $_POST['number'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$qualification = $_POST['qualification'];
$course = $_POST['course'];
$placement = $_POST['placement'];

$conn = mysqli_connect('localhost', 'root', '', 'student');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO student_details (name, photo,  email, number, birthdate, gender, address, qualification, course, placement)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sbsissssss", $name, $photo, $email, $number, $birthdate, $gender, $address, $qualification, $course, $placement);
    if ($stmt->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Message send successfully ")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error: ' . $stmt->error . '")';
        echo '</script>';
    }
}
?>;
