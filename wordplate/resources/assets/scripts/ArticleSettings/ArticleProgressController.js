export default class ArticleProgressController{
  constructor(){
    this.article = document.querySelector('.articleContent');
    this.progressValueElement = document.querySelector('.progress .value');
    this.articleLength = this.article.clientHeight;

    this.postID = document.querySelector('article').attributes['data-postID'].value;
    this.userID = document.querySelector('article').attributes['data-userID'].value;
    this.dbValue = 0;


    this.setUpEventListeners();

    if(this.userID)
      window.setInterval(this.saveProgressToDB.bind(this), 5000);

    if(this.userID)
      this.getProgressFromDB();
  }

  setUpEventListeners(){
    window.addEventListener('scroll', () => {
      this.setPercent();
    });

    window.addEventListener('resize', () => {
      // Update articleLength since the width of the article has changed.
      this.articleLength = this.article.clientHeight;
      this.setPercent();
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

  saveProgressToDB(){
    console.log('user', this.userID, 'article', this.postID, 'progress', this.getPercent());
    let request = new Request('https://edvinwiberg.me/wp-json/api/v1/saveUserProgress', {
      method: 'POST',
      body: JSON.stringify({
        articleID: this.postID,
        userID: this.userID,
        progress: this.getPercent()
      }),
    });

    fetch(request)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        console.log(data);
      });
  }

  getProgressFromDB(){
    fetch(`https://edvinwiberg.me/wp-json/api/v1/getUserProgress/${this.postID}/${this.userID}`)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        this.dbValue = data;
      })
      .catch((error) => {
        console.log(error);
      });
  }
}
