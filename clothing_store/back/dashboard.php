<?php
session_start();

// تأكد إن المستخدم مسجّل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard {
      max-width: 600px;
      margin: 100px auto;
      background: white;
      padding: 30px;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="dashboard">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>You are now logged in.</p>
    <a href="prodcuts.php" class="btn btn-success">View Products</a>
    <a href="logout.php" class="btn btn-danger">Logout</a>
  </div>

</body>
</html>
