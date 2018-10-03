import SettingsViewController from './SettingsViewController.js';
import FontController from './FontController.js';
import LayoutController from './LayoutController.js';
import ColorController from './ColorController.js';

export default class SettingsController{
  constructor(){

    this.settingsButton = document.querySelector('.articlePost .settingsButton');
    if (this.settingsButton) {
      this.settings = document.querySelector('.articlePost .settings');
      this.settingsClose = this.settings.querySelector('.close');
      this.setUpListener(this.settingsButton);
      this.setUpListener(this.settingsClose);

      this.move = this.move.bind(this);
      this.end = this.end.bind(this);
      this.update = this.update.bind(this);

      this.dragging = false;
      this.X = window.innerWidth - 15;
      this.Y = 287;
      this.windowHeight = window.innerHeight;
      this.windowWidth = window.innerWidth;
      this.setUpMoveListeners();

      new SettingsViewController();
      new FontController();
      new LayoutController();
      new ColorController();
    }
  }

  setUpMoveListeners() {
    this.settingsButton.addEventListener('touchmove', this.move);
    this.settingsButton.addEventListener('touchend', this.end);
  }

  move(e) {
    if (!e.target.classList.contains('settingsButton'))
      return;

    this.dragging = true;
    requestAnimationFrame(this.update);

    this.X = e.clientX || e.touches[0].clientX;
    this.Y = e.clientY || e.touches[0].clientY;

    e.preventDefault();
  }

  end() {
    this.dragging = false;
    this.settingsButton.style.right = 'unset';
    if (this.X > this.windowWidth / 2) {
      this.X = this.windowWidth - this.settingsButton.clientWidth - 15;
      this.settingsButton.style.left = `${this.X}px`;
    } else {
      this.X = 15;
      this.settingsButton.style.left = `${this.X}px`;
    }
  }

  update() {
    if (!this.dragging)
      return;

    requestAnimationFrame(this.update);

    this.settingsButton.style.left = `${Math.abs(this.X - this.settingsButton.clientWidth / 2)}px`;
    this.settingsButton.style.top = `${this.Y - this.settingsButton.clientHeight / 2}px`;

    document.querySelector('.settings').style.top = `${this.Y - this.settingsButton.clientHeight / 2}px`;

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
