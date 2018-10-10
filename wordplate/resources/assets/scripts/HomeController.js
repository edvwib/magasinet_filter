export default class HomeController{
  constructor(){
    this.featuredArticle = document.querySelector('.home .featured .article');
    this.featuredArticleImage =
      document.querySelector('.home .featured .article')
        .attributes['data-img'].value;

    this.setUpListeners();
  }

  setUpListeners(){
    window.addEventListener('load', () => {
      this.setFeaturedBackgroundImage();
    });
  }

  setFeaturedBackgroundImage(){
    this.featuredArticle.setAttribute(
      'style',
      `background-image: url(${this.featuredArticleImage});`
    );
  }

}
