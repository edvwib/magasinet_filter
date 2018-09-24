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

// Article progress %
let progressElement = document.querySelector('.articlePost .progress .value');
if(progressElement){
  let articleLength = document.querySelector('.articlePost').clientHeight;
  window.addEventListener('scroll', () => {
    let percentProgress = Math.floor((window.scrollY / (articleLength - window.innerHeight)) * 100);
    progressElement.textContent = percentProgress;
  });
}
