export default class SettingsViewController{
  constructor(){
    this.fontButton = document.querySelector('.settings .menu .font');
    this.textButton = document.querySelector('.settings .menu .text');
    this.colorButton = document.querySelector('.settings .menu .color');
    this.buttons = document.querySelectorAll('.settings .menu .button');
    this.views = document.querySelectorAll('.settings .view');

    this.setUpButtonListeners();

    // Check for saved user settings and apply if found
    let oldView = window.localStorage.getItem('articleSettingsView');
    if(oldView)
      this.handleButtonClick(oldView);
  }

  setUpButtonListeners(){
    this.buttons.forEach(button => {
      button.addEventListener('click', (e) => {
        this.handleButtonClick(e.target.classList[0]);
      });
    });
  }

  handleButtonClick(view){
    window.localStorage.setItem('articleSettingsView', view);

    this.buttons.forEach(x => {
      view === x.classList[0] ? x.classList.add('active') : x.classList.remove('active');
    });
    this.setView(view);
  }

  setView(view){
    this.views.forEach(x => {
      view === x.classList[0] ? x.classList.add('active') : x.classList.remove('active');
    });
  }
}
