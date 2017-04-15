import React from 'react'
import ArticleItem from '../components/article-item'
import '../../../dev/styles/article-list.sass'
import { IndexLink } from 'react-router'
import { Button, MenuItem, Dropdown } from 'react-bootstrap'

export default class ArticleList extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      sortType: 0
    }
  }

  /* Automatically fetch articles */
  // TODO: Rewrite fetch articles to take parameter and use as query parameter.
  componentWillMount() {
    this.props.fetchArticles();
  }

   /*
  * Returns articles list sorted depending on the current state of sort type.
  * 0: Title
  * 1: Author
  * 2: Conference
  * 3: Frequency
  * */
  sortedArticles() {
    let articles = []
    if (this.props.articleData.articles) {
      articles = this.props.articleData.articles
    }
    switch (this.state.sortType) {
      case 0:
        return [...articles].sort((a, b) => a.title > b.title)
      case 1:
        return [...articles].sort((a, b) => a.authors[0] > b.authors[0])
      case 2:
        return [...articles].sort((a, b) => a.conferences[0] > b.conferences[0])
      case 3:
        return [...articles].sort((a, b) => a.frequency < b.frequency)
      default:
        return []
    }
  }

  render() {
    const { word } = this.props.params
    const articles = this.sortedArticles()
    const mappedArticles = articles.map((article, i) => <li><ArticleItem {...this.props} key={article.title + i} word={word} onChange={this.checkArticle.bind(this)} article={article} /></li>)
    return (
      <div className="container" id="articles-div">
        <div className="row" id="articles-title-div">
          <p id="articles-title">
            {word}
          </p>
          <br />
        </div>
        <div className="row" id="articles-sorting-div">
          <Dropdown id="dropdown-toolbar">
            <Button id="dropdown-colors">
              Sort By ...
            </Button>
            <Dropdown.Toggle bsStyle="success" />
            <Dropdown.Menu className="dropdown-style">
              <MenuItem eventKey="1" onClick={() => this.setState({ sortType: 0 })}>
              Title</MenuItem>
              <MenuItem eventKey="2" onClick={() => this.setState({ sortType: 1 })}>
              Authors</MenuItem>
              <MenuItem eventKey="3" onClick={() => this.setState({ sortType: 2 })}>
              Conferences</MenuItem>
              <MenuItem eventKey="4" onClick={() => this.setState({ sortType: 3 })}>
              Occurences</MenuItem>
            </Dropdown.Menu>
          </Dropdown>
        </div>
        <div className="row" id="articles-article-list-div">
          <ul id="articles-list-element">
            {mappedArticles}
          </ul>
        </div>
        <div className="row" id="articles-generate-wc-button-div">
            <button className="btn btn-primary" id="articles-generate-button" onClick={this.generateWCFromSelected.bind(this)}>
              <span className="glyphicon glyphicon-cloud"></span> Generate Word Cloud From Selected Articles
            </button>
        </div>
        <div className="row" id="articles-dl-button-div">
          <button className="btn btn-primary" id="articles-dl-pdf-button">
            <span className="glyphicon glyphicon-download"></span> Download List as PDF
          </button>
          <button className="btn btn-primary" id="articles-dl-txt-button">
            <span className="glyphicon glyphicon-download"></span> Download List as TXT
          </button>
        </div>
      </div>
    )
  }
}