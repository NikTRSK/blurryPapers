import React from 'react'
import * as ReactBootstrap from 'react-bootstrap'
import Highlight from 'react-highlighter'
import FileSaver from 'file-saver'
import axios from 'axios'
import { IndexLink } from 'react-router'
import '../../../dev/styles/article-item.sass'

export default class ArticleItem extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      showModal: false,
      showAbstract: false,
      checked: false
    }
    this.openBibtex = this.openBibtex.bind(this)
    this.closeBibtex = this.closeBibtex.bind(this)
    this.openAbstract = this.openAbstract.bind(this)
    this.closeAbstract = this.closeAbstract.bind(this)
    this.handleCheckbox = this.handleCheckbox.bind(this)
    this.downloadHighlight = this.downloadHighlight.bind(this)
  }
  openAbstract() {
	  const {doi } = this.props.article
	  this.props.fetchAbstract(doi)
    this.setState({ showAbstract: true })
  }
  closeAbstract() {
    this.props.clearAbstract()
    this.setState({ showAbstract: false })
  }
  openBibtex() {
	  const { doi } = this.props.article
	  this.props.fetchBibtex(doi)
    this.setState({ showModal: true })
  }
  closeBibtex() {
    this.props.clearBibtex()
    this.setState({ showModal: false })
  }
  handleCheckbox() {
    const checked = this.state.checked
    this.setState({ checked: !checked })
    this.props.onChange(this.props.article.doi, !checked)
  }
  downloadHighlight(url,word) {
    let str = `\"${url}\"`;
    console.log("Download Highlighted Function")
    axios.get(`http://localhost:8888/Server.php?convertPDF=${str}&highlight=${word}`)
    .then((response) => {
      let link = document.createElement('a')
      link.href = response.data
      link.download = 'highlighted-article.pdf'
      link.dispatchEvent(new MouseEvent('click'))
    })
    .catch((err) => {
      console.log("fuck top level")
    })
  }
	// TODO: Switch "Smith" with author
	/*
	this.props.addToHistory(author, 5);
	this.props.generatePapers(author);
	*/
  authorRoute(author) {
    this.props.addToHistory('Smith', 5)
    this.props.generatePapers('Smith')
  }
	// TODO: Switch "Smith" with conference
	/*
	this.props.addToHistory(conference, 5);
	this.props.generatePapers(conference);
	*/
  conferenceRoute(conference) {
    this.props.addToHistory('Smith', 5)
    this.props.generatePapers('Smith')
  }

  render() {
    console.log("HELLO FROM ARTICLE ITEM")
    console.log(this.props)
    const { authors, conference, title, doi, wordFrequency } = this.props.article
            let downloadLink = "https://depts.washington.edu/owrc/Handouts/What%20is%20an%20Academic%20Paper.pdf"
    const { bibtex } = this.props.bibtexData.bibtex
    const { abstract } = this.props.abstractData.abstract
    const { word, uniqueID } = this.props
    const { showAbstract, showModal, checked } = this.state
    const mappedAuthors = authors.map((author, i) =>
      <IndexLink to="/" id={`author-num-${i}`} key={i} onClick={this.authorRoute.bind(this, author)}>
				{!!i && ', '}
				{author}
      </IndexLink>
		)
    const mappedConferences = conference.map((conference, i) =>
      <IndexLink to="/" id={`conference-num-${i}`} key={i} onClick={this.conferenceRoute.bind(this, conference)}>
				{!!i && ', '}
				{conference}
      </IndexLink>
		)

    return (
      <div className="container" id="article-container">

				{/* BibTeX popup */}
        <div className="row">
          <div>
            <ReactBootstrap.Modal show={showModal} onHide={this.closeBibtex}>
              <ReactBootstrap.Modal.Header closeButton>
                <ReactBootstrap.Modal.Title>BibTeX</ReactBootstrap.Modal.Title>
              </ReactBootstrap.Modal.Header>
              <ReactBootstrap.Modal.Body>
                <pre id="bibtex-text" className="article-modal-pre">{bibtex}</pre>
              </ReactBootstrap.Modal.Body>
            </ReactBootstrap.Modal>
          </div>
        </div>

				{/* BibTeX popup */}
        <div className="row">
          <div>
            <ReactBootstrap.Modal show={showAbstract} onHide={this.closeAbstract}>
              <ReactBootstrap.Modal.Header closeButton>
                <ReactBootstrap.Modal.Title>Abstract</ReactBootstrap.Modal.Title>
              </ReactBootstrap.Modal.Header>
              <ReactBootstrap.Modal.Body>
                <pre id="abstract-text" className="article-modal-pre">
                  <Highlight search={word} matchStyle={{ backgroundColor: '#ffd54f' }}>
                    {abstract}
                  </Highlight>
                </pre>
                  <button className="btn btn-primary" id="highlight-dl-button" onClick={()=>this.downloadHighlight(downloadLink,word)}>
                    <span className="glyphicon glyphicon-download"></span> Download
                  </button>
              </ReactBootstrap.Modal.Body>
            </ReactBootstrap.Modal>
          </div>
        </div>

				{/* Article Checkbox + Title */}
        <div className="row" id="article-title-container">
          <table>
            <tr>
              <th className="article-checkbox-col">
                <input type="checkbox" ref={doi} value={checked} id="article-checkbox" onChange={this.handleCheckbox} />
              </th>
              <th className="article-title-col">
                <a onClick={this.openAbstract}><p className="title-getter" id="article-title">{title}</p></a>
              </th>
            </tr>
          </table>
        </div>

        {/* Word + Occurences */}
        <div className="row" id="article-authors-container">
          <span id="article-occurences-1">{word}: </span>
          <span id="article-occurences-2">Occurs </span>
          <span className="frequency-getter" id="article-occurences-1">{wordFrequency}</span>
          <span id="article-occurences-2"> times.</span>
        </div>

				{/* Article Authors */}
        <div className="row" className="authors-getter" id="article-authors-container">
          <span id="article-authors">Authors: </span>
					{mappedAuthors}
        </div>

				{/* Article Conferences */}
        <div className="row" className="conference-getter" id="article-authors-container">
          <span id="article-conferences">Conferences: </span>
					{mappedConferences}
        </div>

				{/* Buttons */}
        <div className="row" id="article-buttons-container">
          <button className="btn btn-primary" id="article-bibtex-button" onClick={this.openBibtex}>
            <span className="glyphicon glyphicon-book"></span> BibTeX
          </button>
          <a target="_blank" href={downloadLink}>
            <button className="btn btn-primary" id="article-dl-button">
              <span className="glyphicon glyphicon-download"></span> Download
            </button>
          </a>
        </div>
      </div>
		)
  }
}

ArticleItem.propTypes = {
  addToHistory: React.PropTypes.func,
  generatePapers: React.PropTypes.func,
  fetchAbstract: React.PropTypes.func,
  clearAbstract: React.PropTypes.func,
  fetchBibtex: React.PropTypes.func,
  onChange: React.PropTypes.func,
  clearBibtex: React.PropTypes.object,
  article: React.PropTypes.object,
  bibtexData: React.PropTypes.object,
  abstractData: React.PropTypes.object,
  word: React.PropTypes.string
}
