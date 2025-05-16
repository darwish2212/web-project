<?php
$host = 'localhost';
$dbname = 'clothing_store';
$username = 'root'; // حسب اسم المستخدم في XAMPP أو MAMP
$password = '';     // افتراضيًا فاضي في XAMPP

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>