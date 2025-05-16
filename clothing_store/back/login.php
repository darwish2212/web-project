<?php
require 'db.php';
session_start(); // ضروري عشان نستخدم الجلسات

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    // نحفظ بيانات المستخدم في جلسة
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    
    // نوديه للداشبورد
    header("Location: dashboard.php");
    exit();
} else {
    echo "Invalid email or password.";
}
?>