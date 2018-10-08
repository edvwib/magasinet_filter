export default class MenuController{
  constructor(){
    this.button = document.querySelector('nav .menuIcon');
    this.drawer = document.querySelector('nav .menuDrawer');
    this.drawerVisible = false;

    this.loginViewButton = document.querySelector('nav .login');
    this.loginView = document.querySelector('nav .loginView');
    this.loginViewCloseButton = document.querySelector('nav .loginView .close');

    this.setUpListeners();
  }

  setUpListeners(){
    this.button.addEventListener('click', () => {
      this.toggleDrawer();
    });

    this.loginViewButton ? this.loginViewButton.addEventListener('click', () => {
      this.toggleLoginView();
    }) : null;
    this.loginViewCloseButton.addEventListener('click', () => {
      this.toggleLoginView();
    });
  }

  toggleDrawer(){
    this.drawer.classList.toggle('active');
  }

  toggleLoginView(){
    this.loginView.classList.toggle('active');
  }
}
