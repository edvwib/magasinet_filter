import SettingsViewController from './SettingsViewController.js';
import FontController from './FontController.js';
// import LayoutController from './LayoutController.js';
// import ColorController from './ColorController.js';

export default class SettingsController{
  constructor(){
    console.log('SettingsController loaded');

    new SettingsViewController();

    this.settingsButton = document.querySelector('.articlePost .settingsButton');
    if (this.settingsButton) {
      this.settings = document.querySelector('.articlePost .settings');
      this.settingsClose = this.settings.querySelector('.settingsClose');
      this.setUpListener(this.settingsButton);
      this.setUpListener(this.settingsClose);
    }

    new FontController();
    // new LayoutController();
    // new ColorController();
  }

  setUpListener(e){
    e.addEventListener('click', () => {
      this.toggleSettingsView();
    });
  }

  toggleSettingsView(){
    this.settingsButton.classList.contains('active')
      ? this.settingsButton.classList.remove('active')
      : this.settingsButton.classList.add('active');
    this.settings.classList.contains('active')
      ? this.settings.classList.remove('active')
      : this.settings.classList.add('active');
  }
}
