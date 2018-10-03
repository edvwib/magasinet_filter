export default class SettingsButtonController{
  constructor(){
    this.start = this.start.bind(this);
    this.move = this.move.bind(this);
    this.end = this.end.bind(this);
    this.update = this.update.bind(this);

    this.settingsButton = document.querySelector('.settingsButton');
    this.dragging = false;
    this.X = window.innerWidth - 15;
    this.Y = 287;
    this.windowHeight = window.innerHeight;
    this.windowWidth = window.innerWidth;

    this.setUpListeners();
  }

  setUpListeners(){
    this.settingsButton.addEventListener('touchstart', this.start);
    this.settingsButton.addEventListener('touchmove', this.move);
    this.settingsButton.addEventListener('touchend', this.end);
    // this.settingsButton.addEventListener('mousedown', this.start);
    // this.settingsButton.addEventListener('mousemove', this.move);
    // this.settingsButton.addEventListener('mouseup', this.end);
  }

  start(e){
    if (!e.target.classList.contains('settingsButton'))
      return;

    this.dragging = true;
    requestAnimationFrame(this.update);
  }

  move(e){
    if (!this.dragging || !e.target.classList.contains('settingsButton'))
      return;

    this.X = e.clientX || e.touches[0].clientX;
    this.Y = e.clientY || e.touches[0].clientY;

    e.preventDefault();
  }

  end(){
    this.dragging = false;
    this.settingsButton.style.right = 'unset';
    if(this.X > this.windowWidth / 2){
      this.X = this.windowWidth-this.settingsButton.clientWidth-15;
      this.settingsButton.style.left = `${this.X}px`;
    } else {
      this.X = 15;
      this.settingsButton.style.left = `${this.X}px`;
    }
  }

  update() {
    if(!this.dragging)
      return;

    requestAnimationFrame(this.update);

    this.settingsButton.style.left = `${Math.abs(this.X - this.settingsButton.clientWidth / 2)}px`;
    this.settingsButton.style.top = `${this.Y - this.settingsButton.clientHeight / 2}px`;
  }
}
