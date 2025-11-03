<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $sql = "INSERT INTO tbl_users (user_firstname, user_lastname, user_gender, user_email, user_password) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $gender, $email, $password]);
        
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } catch(PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='registration.php';</script>";
    }
}
?>