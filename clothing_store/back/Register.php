<?php
// 1. الاتصال بقاعدة البيانات
require 'db.php';

// 2. استقبال البيانات من الفورم
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// 3. التحقق من تطابق كلمة المرور
if ($password !== $confirm_password) {
  die("Passwords do not match.");
}

// 4. تشفير كلمة المرور
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 5. حفظ البيانات في قاعدة البيانات
try {
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
  $stmt->execute([
    ':username' => $username,
    ':email' => $email,
    ':password' => $hashed_password
  ]);

  echo "Account created successfully! <a href='../front/login.html'>Login Now</a>";

} catch (PDOException $e) {
  // 6. لو الإيميل موجود بالفعل
  if ($e->getCode() == 23000) {
    echo "Email already registered.";
  } else {
    echo "Error: " . $e->getMessage();
  }
}
?>