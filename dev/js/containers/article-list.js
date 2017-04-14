import React from 'react'
import ArticleItem from '../components/article-item'
import '../../../dev/styles/article-list.sass'
import { IndexLink } from 'react-router'
import { Button, MenuItem, Dropdown } from 'react-bootstrap'

export default class ArticleList extends React.Component {
  componentWillMount() {
    this.props.fetchArticles();
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
              <MenuItem eventKey="1">
              Title</MenuItem>
              <MenuItem eventKey="2">
              Authors</MenuItem>
              <MenuItem eventKey="3">
              Conferences</MenuItem>
              <MenuItem eventKey="4">
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