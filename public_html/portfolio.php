<?php
$pageTitle = 'Portfolio';
$pageDescription = 'Explore portfolio samples from Cyrus Design Hub including thumbnails, logos and banners.';
include '../includes/header.php';
$portfolio = [
  ['file' => 'work1.svg', 'category' => 'thumbnail'],
  ['file' => 'work2.svg', 'category' => 'thumbnail'],
  ['file' => 'work3.svg', 'category' => 'thumbnail'],
  ['file' => 'work4.svg', 'category' => 'thumbnail'],
  ['file' => 'work5.svg', 'category' => 'logo'],
  ['file' => 'work6.svg', 'category' => 'logo'],
  ['file' => 'work7.svg', 'category' => 'logo'],
  ['file' => 'work8.svg', 'category' => 'logo'],
  ['file' => 'work9.svg', 'category' => 'banner'],
  ['file' => 'work10.svg', 'category' => 'banner'],
  ['file' => 'work11.svg', 'category' => 'banner'],
  ['file' => 'work12.svg', 'category' => 'banner'],
];
?>
<main class="section">
  <div class="container">
    <h1 class="page-title">Portfolio</h1>
    <p class="muted" style="margin-bottom:1rem;">Click any design to preview it in full view.</p>

    <div class="filter-buttons">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="thumbnail">Thumbnails</button>
      <button class="filter-btn" data-filter="logo">Logos</button>
      <button class="filter-btn" data-filter="banner">Banners</button>
    </div>

    <div class="grid gallery-grid">
      <?php foreach ($portfolio as $item): ?>
        <div class="gallery-item" data-category="<?php echo $item['category']; ?>">
          <img src="../assets/portfolio/<?php echo $item['file']; ?>" alt="<?php echo ucfirst($item['category']); ?> design sample">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<div class="lightbox" role="dialog" aria-label="Image preview">
  <img src="" alt="Portfolio preview">
</div>

<?php include '../includes/footer.php'; ?>
