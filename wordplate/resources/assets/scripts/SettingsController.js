import ArticleProgressController from './ArticleProgressController.js';
import SettingsViewController from './SettingsViewController.js';
import FontController from './FontController.js';
import LayoutController from './LayoutController.js';
import ColorController from './ColorController.js';

export default class SettingsController{
  constructor(){
    new ArticleProgressController();

    this.settingsButton = document.querySelector('.articlePost .settingsButton');
    this.settings = document.querySelector('.articlePost .settings');
    this.settingsClose = this.settings.querySelector('.close');

    this.move = this.move.bind(this);
    this.end = this.end.bind(this);
    this.update = this.update.bind(this);

    this.dragging = false;
    this.X = window.innerWidth - 15;
    this.Y = 287;
    this.settingsButtonWidth = this.settingsButton.clientWidth;
    this.windowHeight = window.innerHeight;
    this.windowWidth = window.innerWidth;

    this.setUpListener(this.settingsButton);
    this.setUpListener(this.settingsClose);
    this.setUpMoveListeners();

    new SettingsViewController();
    new FontController();
    new LayoutController();
    new ColorController();
  }

  setUpMoveListeners() {
    this.settingsButton.addEventListener('touchmove', this.move);
    this.settingsButton.addEventListener('touchend', this.end);
  }

  move(e) {
    if (!e.target.classList.contains('settingsButton'))
      return;

    this.settingsButton.style.transitionDuration = '0s';
    this.dragging = true;
    requestAnimationFrame(this.update);

    this.X = e.clientX || e.touches[0].clientX;
    this.Y = e.clientY || e.touches[0].clientY;

    e.preventDefault();
  }

  end() {
    this.dragging = false;
    this.settingsButton.style.transitionDuration = '0.05s';
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
  }

  moveSettingsWindow(){
    let position = this.Y - (this.settingsButtonWidth / 2);
    if (position > (this.windowHeight - this.settings.clientHeight - 15)){
      let overlap = position - this.settings.clientHeight;
      this.settings.style.top = `${position - overlap}px`;
      // this.settings.style.top = `${this.Y + (this.settingsButtonWidth / 2) - this.settings.clientHeight + overlap}px`;
    }
    else
      this.settings.style.top = `${position}px`;
  }

  setUpListener(e){
    e.addEventListener('click', (e) => {
      this.X = e.clientX || e.touches[0].clientX;
      this.Y = e.clientY || e.touches[0].clientY;
      this.toggleSettingsView();
    });
  }

  toggleSettingsView(){
    this.settingsButton.classList.contains('active')
      ? this.settingsButton.classList.remove('active')
      : this.settingsButton.classList.add('active');

    if (this.settings.classList.contains('active')){
      this.settings.classList.remove('active');
    } else {
      this.settings.classList.add('active');
      this.moveSettingsWindow();
    }
  }
}
