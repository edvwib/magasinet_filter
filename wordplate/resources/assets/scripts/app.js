'use strict';

if (process.env.NODE_ENV === 'production') {
  // Check that service workers are registered
  window.addEventListener('load', function () {
    if ('serviceWorker' in navigator) {
      // Use the window load event to keep the page load performant
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('themes/filter/assets/scripts/sw.js');
      });
    }
  });
}
