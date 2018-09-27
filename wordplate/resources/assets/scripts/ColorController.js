export default class ColorController{
  constructor(){
    this.buttons = document.querySelectorAll('.settings .colorMode input');

    this.setUpListeners();

    // Check for saved user settings and apply if found
    let savedColorMode = window.localStorage.getItem('articleColorMode');
    if (savedColorMode) {
      this.handleColorFormChange(savedColorMode);
      this.buttons.forEach(x => {
        x.id === savedColorMode ? x.checked = true : x.checked = false;
      });
    }
  }

  setUpListeners(){
    this.buttons.forEach(button => {
      button.addEventListener('change', (e) => {
        // e.stopPropagation();
        this.handleColorFormChange(e.target.id);
      });
    });
  }

  handleColorFormChange(color){
    this.setBackgroundColor(color);
    color === 'black' ? this.setColor('999') : this.setColor('000');
  }

  setBackgroundColor(color){
    if (color === 'sepia') {
      document.querySelector('article')
        .style['background-color'] = '#EADDC6';
    }
    else{
      document.querySelector('article')
        .style['background-color'] = color;
    }

    window.localStorage.setItem('articleColorMode', color);
  }

  setColor(color){
    document.querySelector('article')
      .style['color'] = '#' + color;

    if (color === '999') {
      document.querySelector('.metadata').classList.add('black');
    }
    else{
      document.querySelector('.metadata').classList.remove('black');
    }
  }
}
