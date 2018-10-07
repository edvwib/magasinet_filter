export default class ArticleProgressController{
  constructor(){
    this.article = document.querySelector('.articleContent');
    this.progressValueElement = document.querySelector('.progress .value');
    this.articleLength = this.article.clientHeight;

    this.setUpEventListeners();
  }

  setUpEventListeners(){
    window.addEventListener('scroll', () => {
      this.setPercent();
    });

    window.addEventListener('resize', () => {
      // Update articleLength since the width of the article has changed.
      this.articleLength = this.article.clientHeight;
    });

    window.addEventListener('load', () => {
      // Update articleLength when the whole article has loaded (images etc.).
      this.articleLength = this.article.clientHeight;
      this.setPercent();
    });
  }

  getPercent(){
    let percent = Math.floor((window.scrollY / (this.articleLength)) * 100);
    return percent > 100 ? '0' : percent;
  }

  setPercent(){
    this.progressValueElement.textContent = this.getPercent();
  }
}
