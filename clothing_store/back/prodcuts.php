<?php
require 'db.php'; // تأكد إنك عامل ملف db.php وموصل قاعدة البيانات

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products - BandaStore</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Banda Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section for Products -->
  <div class="hero text-white text-center py-5" style="background-image: url('banner.jpeg'); background-size: cover; background-position: center; height: 60vh;">
    <div class="container">
      <h1 class="display-4">Our Collection</h1>
      <p class="lead">Find your perfect outfit</p>
    </div>
  </div>

  <!-- Products Section -->
  <div class="container my-5">
    <h2 class="text-center mb-4">All Products</h2>
    <div class="row g-4 justify-content-center">

      <?php foreach($products as $product): ?>
        <div class="col-md-3">
          <div class="card">
            <img src="uploads/<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($product['price']); ?> EGP</p>
              <a href="order.php" class="btn btn-outline-primary">Buy Now</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center p-3">
    &copy; 2025 BandaStore. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>