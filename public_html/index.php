<?php
$pageTitle = 'Home';
$pageDescription = 'Cyrus Design Hub helps creators and businesses grow with high-quality YouTube thumbnails, logos and social media graphics.';
include '../includes/header.php';
$services = [
  [
    'name' => 'YouTube Thumbnail',
    'description' => 'High-CTR thumbnail designed to boost click-through rates.',
    'delivery' => '24 hours',
    'price' => '₹199',
    'image' => '../assets/images/thumbnail.svg'
  ],
  [
    'name' => 'Logo Design',
    'description' => 'Clean and memorable logo identity for your brand.',
    'delivery' => '2–3 days',
    'price' => '₹499',
    'image' => '../assets/images/logo.svg'
  ],
  [
    'name' => 'YouTube Banner',
    'description' => 'Professional channel banner aligned with your branding.',
    'delivery' => '24–48 hours',
    'price' => '₹299',
    'image' => '../assets/images/banner.svg'
  ],
  [
    'name' => 'Instagram Post Design',
    'description' => 'Eye-catching social graphics crafted for engagement.',
    'delivery' => '24 hours',
    'price' => '₹199',
    'image' => '../assets/images/instagram.svg'
  ],
  [
    'name' => 'Custom Work',
    'description' => 'Need something unique? Get custom graphics tailored for your goals.',
    'delivery' => 'As discussed',
    'price' => 'Contact',
    'image' => '../assets/images/custom.svg'
  ],
];
?>

<main>
  <section class="hero">
    <div class="container">
      <h1>Cyrus <span>Design Hub</span></h1>
      <p>Professional YouTube Thumbnails, Logos &amp; Social Media Graphics</p>
      <p class="lead">Helping creators and businesses grow with high-quality design.</p>
      <a href="#services" class="btn">Order a Design</a>
    </div>
  </section>

  <section id="services" class="section section-dark">
    <div class="container">
      <h2 class="page-title">Services</h2>
      <p class="muted" style="margin-bottom:1rem;">Browse and order your design service instantly via WhatsApp.</p>
      <div class="grid service-grid">
        <?php foreach ($services as $service):
          $message = "Hi Cyrus, I want to order a {$service['name']} ({$service['price']}) from itscyrus.in";
          $whatsappUrl = 'https://wa.me/919876543210?text=' . rawurlencode($message);
        ?>
          <article class="card">
            <img src="<?php echo htmlspecialchars($service['image']); ?>" alt="<?php echo htmlspecialchars($service['name']); ?>">
            <div class="card-content">
              <h3><?php echo htmlspecialchars($service['name']); ?></h3>
              <p class="meta"><?php echo htmlspecialchars($service['description']); ?></p>
              <p class="meta">Delivery: <?php echo htmlspecialchars($service['delivery']); ?></p>
              <p class="price"><?php echo htmlspecialchars($service['price']); ?></p>
              <a class="btn" target="_blank" rel="noopener" href="<?php echo htmlspecialchars($whatsappUrl); ?>">Buy Now</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php include '../includes/footer.php'; ?>
