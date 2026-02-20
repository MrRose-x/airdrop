<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$pageTitle = $pageTitle ?? 'Cyrus Design Hub';
$pageDescription = $pageDescription ?? 'Professional YouTube thumbnails, logos and social media graphics by Cyrus Design Hub.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <title><?php echo htmlspecialchars($pageTitle); ?> | Cyrus Design Hub</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a href="index.php" class="brand">Cyrus <span>Design Hub</span></a>
    <button class="menu-toggle" aria-label="Open menu">☰</button>
    <ul class="nav-links">
      <li><a class="<?php echo $currentPage === 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a></li>
      <li><a href="index.php#services">Services</a></li>
      <li><a class="<?php echo $currentPage === 'portfolio.php' ? 'active' : ''; ?>" href="portfolio.php">Portfolio</a></li>
      <li><a class="<?php echo $currentPage === 'order.php' ? 'active' : ''; ?>" href="order.php">Order</a></li>
      <li><a class="<?php echo $currentPage === 'about.php' ? 'active' : ''; ?>" href="about.php">About</a></li>
      <li><a class="<?php echo $currentPage === 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact</a></li>
    </ul>
  </div>
</header>
