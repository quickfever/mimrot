/**
 * CloudTech Grid Theme Core JavaScript Utilities
 */
window.CloudTechMain = {
  // Toggle Dark/Light Mode
  toggleTheme: function () {
    const currentTheme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-theme', currentTheme);
    localStorage.setItem('cloudtech_theme', currentTheme);
  },

  // Copy URL with toast notification
  copyCurrentUrl: function (btnElement) {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
      const toast = document.getElementById('copy-toast');
      if (toast) {
        toast.classList.add('show');
        setTimeout(() => {
          toast.classList.remove('show');
        }, 3000);
      }
    }).catch(err => {
      console.error('Failed to copy URL: ', err);
    });
  }
};

document.addEventListener('DOMContentLoaded', () => {
  // Theme Toggle Button Event
  const themeBtn = document.getElementById('theme-toggle-btn');
  if (themeBtn) {
    themeBtn.addEventListener('click', () => {
      CloudTechMain.toggleTheme();
    });
  }

  // Search Modal Controls
  const searchTrigger = document.getElementById('search-modal-trigger');
  const searchModal = document.getElementById('search-modal');
  const searchClose = document.getElementById('search-modal-close');

  if (searchTrigger && searchModal) {
    searchTrigger.addEventListener('click', () => {
      searchModal.style.display = 'flex';
      const input = searchModal.querySelector('input[type="search"]');
      if (input) input.focus();
    });
  }

  if (searchClose && searchModal) {
    searchClose.addEventListener('click', () => {
      searchModal.style.display = 'none';
    });
  }

  window.addEventListener('click', (e) => {
    if (searchModal && e.target === searchModal) {
      searchModal.style.display = 'none';
    }
  });
});
