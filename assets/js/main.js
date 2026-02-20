document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  if (toggle && navLinks) {
    toggle.addEventListener('click', () => {
      navLinks.classList.toggle('open');
    });
  }

  const filterButtons = document.querySelectorAll('[data-filter]');
  const galleryItems = document.querySelectorAll('.gallery-item');

  if (filterButtons.length) {
    filterButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const filter = button.dataset.filter;

        filterButtons.forEach((btn) => btn.classList.remove('active'));
        button.classList.add('active');

        galleryItems.forEach((item) => {
          const category = item.dataset.category;
          item.style.display = filter === 'all' || filter === category ? 'block' : 'none';
        });
      });
    });
  }

  const lightbox = document.querySelector('.lightbox');
  const lightboxImg = lightbox ? lightbox.querySelector('img') : null;

  galleryItems.forEach((item) => {
    item.addEventListener('click', () => {
      if (!lightbox || !lightboxImg) return;
      const img = item.querySelector('img');
      lightboxImg.src = img.src;
      lightboxImg.alt = img.alt;
      lightbox.classList.add('open');
    });
  });

  if (lightbox) {
    lightbox.addEventListener('click', () => {
      lightbox.classList.remove('open');
      if (lightboxImg) lightboxImg.src = '';
    });
  }
});
