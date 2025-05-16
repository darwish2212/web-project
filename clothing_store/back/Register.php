<?php

require 'db.php';


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if ($password !== $confirm_password) {
  die("Passwords do not match.");
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


try {
  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
  $stmt->execute([
    ':username' => $username,
    ':email' => $email,
    ':password' => $hashed_password
  ]);

  echo "Account created successfully! <a href='../front/login.html'>Login Now</a>";

} catch (PDOException $e) {
  
  if ($e->getCode() == 23000) {
    echo "Email already registered.";
  } else {
    echo "Error: " . $e->getMessage();
  }
}
?>
