'use strict';

import SettingsController from './SettingsController.js';

if (process.env.NODE_ENV === 'production') {
  // Check that service workers are registered
  window.addEventListener('load', function () {
    if ('serviceWorker' in navigator) {
      // Use the window load event to keep the page load performant
      navigator.serviceWorker.register('/themes/filter/assets/scripts/sw.js');
    }
  });
}


// Article progress %
let article;
let progressElement = document.querySelector('.articlePost .progress .value');
if(progressElement){
  article = document.querySelector('.articlePost');

  setTimeout(() => { // Let the page finish rendering before calculating
    let articleLength = article.clientHeight;
    let articleYTop = Math.floor(article.getBoundingClientRect().top + document.documentElement.scrollTop);
    let articleYBottom = Math.floor(article.getBoundingClientRect().bottom + document.documentElement.scrollTop);

    window.addEventListener('scroll', () => {
      let percentProgress = Math.floor((window.scrollY / (articleLength)) * 100);
      progressElement.textContent = percentProgress >= 98 ? '100' : percentProgress;
    });
    window.addEventListener('resize', () => {
      articleLength = article.clientHeight;
      articleYTop = Math.floor(article.getBoundingClientRect().top + document.documentElement.scrollTop);
      articleYBottom = Math.floor(article.getBoundingClientRect().bottom + document.documentElement.scrollTop);
    });
  }, 2000);
}

document.querySelector('.articleContent') ? new SettingsController() : '';
