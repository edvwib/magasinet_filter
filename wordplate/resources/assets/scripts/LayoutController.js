export default class LayoutController {
  constructor() {
    this.lineHeightButtons = document.querySelectorAll('.settings .lineHeight button');
    this.marginButtons = document.querySelectorAll('.settings .margin button');

    this.setUpEventListeners();

    // Check for saved user settings and apply if found
    let savedLineHeight = window.localStorage.getItem('articleLineHeight');
    if (savedLineHeight) {
      this.setLineHeight(savedLineHeight);
    }
    let savedMargin = window.localStorage.getItem('articleMargin');
    if (savedMargin) {
      this.setMargin(savedMargin);
    }
  }


  setUpEventListeners(){
    this.lineHeightButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        this.handleLineHeightForm(e.target.attributes['data-value'].value);
      });
    });
    this.marginButtons.forEach(button => {
      button.addEventListener('click', (e) => {
        this.handleMarginForm(e.target.attributes['data-value'].value);
      });
    });
  }

  handleLineHeightForm(value){
    this.setLineHeight(value);
    window.localStorage.setItem('articleLineHeight', value);
  }

  handleMarginForm(value){
    this.setMargin(value);
    window.localStorage.setItem('articleMargin', value);
  }


  setLineHeight(height){
    // TODO: Check if font size is overlapping with line-height
    document.querySelector('.articlePost .articleContent')
      .style['line-height'] = height + 'px';
    this.setBorder(height, '.lineHeight');
  }

  setMargin(width) {
    document.querySelector('.articlePost .articleContent')
      .style['max-width'] = width + '%';
    this.setBorder(width, '.margin');
  }

  setBorder(value, container) {
    document.querySelectorAll(`.textLayout ${container} button`).forEach(b => {
      if (b.attributes['data-value'].value === value) {
        b.classList.add('selected');
      } else {
        b.classList.remove('selected');
      }
    });
  }
}
