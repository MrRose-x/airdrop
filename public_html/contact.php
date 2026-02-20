<?php
$pageTitle = 'Contact';
$pageDescription = 'Contact Cyrus Design Hub via WhatsApp, Instagram or contact form.';
$statusMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $message = trim($_POST['message'] ?? '');

  if ($name && $email && $message) {
    $to = 'contact@itscyrus.in';
    $subject = 'Contact Form Message - Cyrus Design Hub';
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: no-reply@itscyrus.in\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
      $statusMessage = 'Thank you! I will contact you on WhatsApp soon.';
    }
  }
}

include '../includes/header.php';
?>
<main class="section">
  <div class="container">
    <h1 class="page-title">Contact</h1>
    <p class="muted" style="margin-bottom:1rem;">Reach out for quick support and custom project discussions.</p>

    <p style="margin-bottom:1rem;">
      <a class="btn whatsapp" target="_blank" rel="noopener" href="https://wa.me/919876543210">WhatsApp</a>
      <a class="btn instagram" target="_blank" rel="noopener" href="https://instagram.com/itscyrus.in">Instagram</a>
    </p>
    <p style="margin-bottom:1rem;">Email: <a href="mailto:contact@itscyrus.in">contact@itscyrus.in</a></p>

    <?php if ($statusMessage): ?>
      <div class="notice"><?php echo htmlspecialchars($statusMessage); ?></div>
    <?php endif; ?>

    <form method="post" class="form-card form-grid">
      <label>Name
        <input type="text" name="name" required>
      </label>
      <label>Email
        <input type="email" name="email" required>
      </label>
      <label>Message
        <textarea name="message" required></textarea>
      </label>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>
</main>
<?php include '../includes/footer.php'; ?>
