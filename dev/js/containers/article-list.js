import React from 'react'
import ArticleItem from '../components/article-item'
import '../../../dev/styles/article-list.sass'
import FileSaver from 'file-saver'
import { IndexLink } from 'react-router'
import { Button, MenuItem, Dropdown } from 'react-bootstrap'
const jsPDF = require('jspdf')

export default class ArticleList extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      sortType: 3
    }
  }

  /* Automatically fetch articles */
  // TODO: Rewrite fetch articles to take parameter and use as query parameter.
  componentWillMount() {
    const { word } = this.props.params
    this.props.fetchArticles(word)
  }

  /*
  * This function is passed to each article and is called when their checkbox if checked.
  * It adds a key-value pair to ArticleList's state (key=article doi, value=checkbox status)
  * This way, when we want to generate a new word cloud based on checked articles we can look
  * at our current state to see what dois are checked and create a query from that.
  * */
  checkArticle(doi, value) {
    const newState = {}
    newState[doi] = value
    this.setState(newState)
  }

	getArticleName(doi) {
		const { articles } = this.props.articleData
		let articleTitle = ""
		articles.forEach((article)=>{
			if (article.doi === doi ) {
				articleTitle = article.title
			}
		})
		return articleTitle
	}
	
  /* Generates query for checked articles */
  generateWCFromSelected() {
    let doiQuery = ''
    let numArticles = 0
	  let articles = []
    const curState = this.state
    for (const key in curState) {
      if (curState.hasOwnProperty(key)) {
        if (curState[key] === true) {
          articles.push(this.getArticleName(key))
          numArticles += 1
          doiQuery += `${key},`
        }
      }
    }
	  if (articles.length != 0) {
		  this.props.addToHistory(articles.join())
		  this.props.generatePapers(doiQuery, -1)
	  }
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
        return [...articles].sort((a, b) => a.conference[0] > b.conference[0])
      case 3:
        return [...articles].sort((a, b) => a.wordFrequency < b.wordFrequency)
      default:
        return []
    }
  }

  /* Generates and saves a txt of the article list */
  listToTXT() {
    const { articles } = this.props.articleData
	  const articleArray = articles.map((article, i) => {
		  let conferences = ""
		  let authors = ""
		  if (article.authors) {
			  authors = article.authors.join()
		  }
			if (article.conferences) {
				conferences = article.conferences.join()
			}
		  return `${i + 1}: ${article.title}\nAuthors: ${authors}\nConferences: ${conferences}\n`
    })
	  const blob = new Blob(articleArray, {
      type: 'text/plain;charset=utf-8'
    })
    FileSaver.saveAs(blob, 'article-list.txt')
  }

  /* Generates and saves a pdf of the article list */
  listToPDF() {
    const doc = new jsPDF()
    const { articles } = this.props.articleData
    doc.setFontSize(10)
    // write articles
    articles.forEach((article, i) => {
	    let authors = ""
	    let conferences = ""
      const startY = 3 * i * 8 + 10
	    if (article.authors) {
		    authors = article.authors.join()
	    }
	    if (article.conferences) {
		    conferences = article.conferences.join()
	    }
      doc.setFontStyle('bold')
      doc.text(`${i + 1}. ${article.title}`, 10, startY)
      doc.setFontStyle('normal')
      doc.text(`Authors: ${authors}`, 10, startY + 8)
      doc.text(`Conferences: ${conferences}`, 10, startY + 16)
    })
    doc.save('article-list.pdf')
  }

  render() {
    const { word } = this.props.params
    const articles = this.sortedArticles()
    const mappedArticles = articles.map((article, i) => <li><ArticleItem {...this.props} uniqueID={i} key={article.title + i} word={word} onChange={this.checkArticle.bind(this)} article={article} /></li>)
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
              <MenuItem id="sort-title" eventKey="1" onClick={() => this.setState({ sortType: 0 })}>
              Title</MenuItem>
              <MenuItem id="sort-authors" eventKey="2" onClick={() => this.setState({ sortType: 1 })}>
              Authors</MenuItem>
              <MenuItem id="sort-conferences" eventKey="3" onClick={() => this.setState({ sortType: 2 })}>
              Conferences</MenuItem>
              <MenuItem id="sort-frequency" eventKey="4" onClick={() => this.setState({ sortType: 3 })}>
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
          <IndexLink to="/">
            <button className="btn btn-primary" id="articles-generate-button" onClick={this.generateWCFromSelected.bind(this)}>
              <span className="glyphicon glyphicon-cloud"></span> Generate Word Cloud From Selected Articles
            </button>
          </IndexLink>
        </div>
        <div className="row" id="articles-dl-button-div">
          <button className="btn btn-primary" id="articles-dl-pdf-button" onClick={this.listToPDF.bind(this)}>
            <span className="glyphicon glyphicon-download"></span> Download List as PDF
          </button>
          <button className="btn btn-primary" id="articles-dl-txt-button" onClick={this.listToTXT.bind(this)}>
            <span className="glyphicon glyphicon-download"></span> Download List as TXT
          </button>
        </div>
      </div>
    )
  }
}

 ArticleList.propTypes = {
   fetchArticles: React.PropTypes.func,
   addToHistory: React.PropTypes.func,
   generatePapers: React.PropTypes.func,
   articleData: React.PropTypes.object,
   params: React.PropTypes.object
 }
