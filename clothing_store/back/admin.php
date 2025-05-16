<?php
require 'db.php';

// حذف منتج لو وصله طلب حذف
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
}

// جلب المنتجات
$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - BandaStore</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">BandaStore</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="../front/index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="../back/products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="../front/login.html">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="../front/register.html">Register</a></li>
        </ul>        
      </div>
    </div>
  </nav>
<div class="container my-5">
  <h2 class="text-center mb-4">Admin Dashboard</h2>



  <!-- Form لإضافة منتج -->
  <div class="card mb-5">
    <div class="card-header">Add New Product</div>
    <div class="card-body">
      <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label>Product Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Description</label>
          <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label>Price</label>
          <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Image</label>
          <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
    </div>
  </div>

  <!-- جدول عرض المنتجات -->
  <h4>Current Products</h4>
  <table class="table table-bordered text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price ($)</th>
        <th>Image</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
      <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><img src="<?= $product['image'] ?>" width="50"></td>
        <td>
          <a href="admin.php?delete=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
 <!-- Footer -->
 <footer class="bg-dark text-white text-center p-3">
    &copy; 2025 BandaStore. All rights reserved.
  </footer>

</body>
</html>