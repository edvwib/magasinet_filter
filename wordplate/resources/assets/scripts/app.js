'use strict';

import MenuController from './MenuController.js';
import SettingsController from './ArticleSettings/SettingsController.js';

if (process.env.NODE_ENV === 'production') {
  // Check that service workers are registered
  window.addEventListener('load', function () {
    if ('serviceWorker' in navigator) {
      // Use the window load event to keep the page load performant
      navigator.serviceWorker.register('/themes/filter/assets/scripts/sw.js');
    }
  });
}

new MenuController();
document.querySelector('.articleContent') ? new SettingsController() : '';
