export default class FontController{
  constructor(){
    console.log('FontController loaded');

    this.fontLabels = document.querySelectorAll('.articlePost .font label');
    this.fontInputs = document.querySelectorAll('.articlePost .font input');

    this.fontInputContainer = document.querySelector('.articlePost .size .input');
    this.fontMinus = document.querySelector('.articlePost .size .minus');
    this.fontPlus = document.querySelector('.articlePost .size .plus');
    this.fontSizeOptions = document.querySelectorAll('.articlePost .size .options .rect');

    this.setUpFormListeners();


    let savedFontSize = window.localStorage.getItem('articleFontSize');
    if (savedFontSize) {
      this.setFontSize(savedFontSize);
      this.setFontSizeRange(savedFontSize);
    }
  }

  setUpFormListeners(){
    this.fontLabels.forEach(x => {
      x.addEventListener('click', (e) => {
        this.handleFontFamilyForm(e);
      });
    });
    this.fontInputs.forEach(x => {
      x.addEventListener('click', (e) => {
        this.handleFontFamilyForm(e);
      });
    });
    this.fontMinus.addEventListener('click', (e) => {
      this.handleFontSizeForm(e);
    });
    this.fontPlus.addEventListener('click', (e) => {
      this.handleFontSizeForm(e);
    });
  }

  handleFontFamilyForm(e){
    switch (e.target.defaultValue) {
    case 'harriet':
      this.setFontFamily('Harriet Display Regular');
      break;
    case 'playfair':
      this.setFontFamily('Playfair Display');
      break;
    case 'merriweather':
      this.setFontFamily('Merriweather');
      break;
    case 'opensans':
      this.setFontFamily('Open Sans');
      break;
    case 'montserrat':
      this.setFontFamily('Montserrat');
      break;
    case 'opendyslexic':
      this.setFontFamily('OpenDyslexic');
      break;
    default:
      this.setFontFamily('Harriet Display Regular');
      break;
    }
  }

  setFontFamily(font){
    document.querySelector('.articlePost .articleContent')
      .style['font-family'] = font;
  }

  handleFontSizeForm(e){
    let value = e.path[1].attributes['data-size'].value;
    let direction = e.target.classList.value;
    if ((value == 13 && direction == 'minus') || (value == 31 && direction == 'plus')) {
      return;
    }
    if (direction === 'minus') {
      e.path[1].attributes['data-size'].value = value - 2;
    }
    else{
      e.path[1].attributes['data-size'].value = Number(value) + 2;
    }
    let newValue = e.path[1].attributes['data-size'].value;

    this.setFontSizeRange(newValue);
    this.setFontSize(newValue);
    window.localStorage.setItem('articleFontSize', newValue);
  }

  setFontSize(size){
    document.querySelector('.articlePost .articleContent')
      .style['font-size'] = size + 'px';
  }

  setFontSizeRange(newValue){
    this.fontInputContainer.attributes['data-size'].value = newValue;
    this.fontSizeOptions.forEach(x => {
      if (newValue >= x.attributes['data-size'].value) {
        x.classList.add('filled');
      }
      else {
        x.classList.remove('filled');
      }
    });
  }
}
