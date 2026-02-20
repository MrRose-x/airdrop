<?php
$pageTitle = 'Order';
$pageDescription = 'Place your design order with Cyrus Design Hub.';
$statusMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $service = trim($_POST['service'] ?? '');
  $description = trim($_POST['description'] ?? '');
  $reference = trim($_POST['reference'] ?? '');

  if ($name && $phone && $service && $description) {
    $to = 'contact@itscyrus.in';
    $subject = 'New Order Request - Cyrus Design Hub';
    $bodyText = "New design order submitted:\n\n"
      . "Name: $name\n"
      . "WhatsApp Number: $phone\n"
      . "Service: $service\n"
      . "Description: $description\n"
      . "Reference Link: " . ($reference ?: 'N/A') . "\n";

    $headers = "From: no-reply@itscyrus.in\r\n";
    $sent = false;

    if (!empty($_FILES['attachment']['tmp_name']) && is_uploaded_file($_FILES['attachment']['tmp_name'])) {
      $fileTmp = $_FILES['attachment']['tmp_name'];
      $fileName = basename($_FILES['attachment']['name']);
      $fileType = mime_content_type($fileTmp);
      $fileContent = chunk_split(base64_encode(file_get_contents($fileTmp)));

      $boundary = md5((string) time());
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

      $message = "--$boundary\r\n";
      $message .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
      $message .= $bodyText . "\r\n";
      $message .= "--$boundary\r\n";
      $message .= "Content-Type: $fileType; name=\"$fileName\"\r\n";
      $message .= "Content-Transfer-Encoding: base64\r\n";
      $message .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n\r\n";
      $message .= $fileContent . "\r\n";
      $message .= "--$boundary--";

      $sent = mail($to, $subject, $message, $headers);
    } else {
      $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
      $sent = mail($to, $subject, $bodyText, $headers);
    }

    if ($sent) {
      $statusMessage = 'Thank you! I will contact you on WhatsApp soon.';
    }
  }
}

include '../includes/header.php';
?>
<main class="section">
  <div class="container">
    <h1 class="page-title">Place an Order</h1>
    <p class="muted" style="margin-bottom:1rem;">Fill out your details and project requirements. You'll get a response soon.</p>

    <?php if ($statusMessage): ?>
      <div class="notice"><?php echo htmlspecialchars($statusMessage); ?></div>
    <?php endif; ?>

    <form class="form-card form-grid" method="post" enctype="multipart/form-data">
      <label>Name
        <input type="text" name="name" required>
      </label>
      <label>WhatsApp Number
        <input type="tel" name="phone" required>
      </label>
      <label>Service
        <select name="service" required>
          <option value="">Select a service</option>
          <option>YouTube Thumbnail</option>
          <option>Logo Design</option>
          <option>YouTube Banner</option>
          <option>Instagram Post Design</option>
          <option>Custom Work</option>
        </select>
      </label>
      <label>Description
        <textarea name="description" required placeholder="Tell me your requirements"></textarea>
      </label>
      <label>Reference Link (optional)
        <input type="url" name="reference" placeholder="https://">
      </label>
      <label>File Upload (optional)
        <input type="file" name="attachment">
      </label>
      <button type="submit" class="btn">Submit Order</button>
    </form>
  </div>
</main>
<?php include '../includes/footer.php'; ?>
