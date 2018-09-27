export default class SettingsViewController{
  constructor(){
    console.log('SettingsViewController loaded');

    this.fontButton = document.querySelector('.settings .menu .font');
    this.textButton = document.querySelector('.settings .menu .text');
    this.colorButton = document.querySelector('.settings .menu .color');
    this.buttons = document.querySelectorAll('.settings .menu .button');
    this.views = document.querySelectorAll('.settings .view');

    this.setUpButtonListeners();
  }

  setUpButtonListeners(){
    this.buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        this.handleButtonClick(e.target.classList[0]);
      });
    });
  }

  handleButtonClick(button){
    this.buttons.forEach(x => {
      button === x.classList[0] ? x.classList.add('active') : x.classList.remove('active');
    });
    this.setView(button);
  }

  setView(view){
    this.views.forEach(x => {
      view === x.classList[0] ? x.classList.add('active') : x.classList.remove('active');
    });
  }
}
