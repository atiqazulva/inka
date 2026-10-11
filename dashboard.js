/**
 * Inka - Platform Media Pembelajaran UMKM
 * Minimal client-side interactions
 */
document.addEventListener('DOMContentLoaded', () => {
  // Bookmark toggle on news cards
  const bookmarkButtons = document.querySelectorAll('.news-action');
  bookmarkButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      const svg = btn.querySelector('svg');
      if (svg) {
        const isFilled = svg.getAttribute('fill') === '#776B55';
        svg.setAttribute('fill', isFilled ? 'none' : '#776B55');
      }
    });
  });
});
