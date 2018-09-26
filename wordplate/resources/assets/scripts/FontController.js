export default class FontController{
  constructor(){
    console.log('FontController loaded');

    this.fontLabels = document.querySelectorAll('.articlePost .font label');
    this.fontInputs = document.querySelectorAll('.articlePost .font input');

    this.setUpFormListeners();
  }

  setUpFormListeners(){
    this.fontLabels.forEach(x => {
      x.addEventListener('click', (e) => {
        this.handleFontForm(e);
      });
    });
    this.fontInputs.forEach(x => {
      x.addEventListener('click', (e) => {
        this.handleFontForm(e);
      });
    });
  }

  handleFontForm(e){
    switch (e.target.defaultValue) {
      case 'harriet':
        this.changeFont('Harriet Display Regular');
        break;
      case 'playfair':
        this.changeFont('Playfair Display');
        break;
      case 'merriweather':
        this.changeFont('Merriweather');
        break;
      case 'opensans':
        this.changeFont('Open Sans');
        break;
      case 'montserrat':
        this.changeFont('Montserrat');
        break;
      case 'opendyslexic':
        this.changeFont('OpenDyslexic');
        break;
      default:
        this.changeFont('Harriet Display Regular');
        break;
    }
  }

  changeFont(font){
    document.querySelector('.articlePost .articleContent')
      .style['font-family'] = font;
  }
}
