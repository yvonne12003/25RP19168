<?php
session_start();
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        $sql = "SELECT * FROM tbl_users WHERE user_email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_firstname'] = $user['user_firstname'];
            $_SESSION['user_email'] = $user['user_email'];
            
            echo "<script>alert('Login successful! Welcome " . $user['user_firstname'] . "'); 
                  window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Invalid email or password!'); window.location.href='login.php';</script>";
        }
    } catch(PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='login.php';</script>";
    }
}
?>