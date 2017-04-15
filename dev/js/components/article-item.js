import React from 'react';
import { connect } from "react-redux"
import { fetchBibtex } from "../actions/actionCreators";
import * as ReactBootstrap from 'react-bootstrap'
import '../../../dev/styles/article-item.sass';

export default class ArticleItem extends React.Component {
	constructor(props) {
    super(props);
    this.state = {
      showModal: false,
      showAbstract: false
    };
    this.openBibtex = this.openBibtex.bind(this);
    this.closeBibtex = this.closeBibtex.bind(this);
    this.openAbstract = this.openAbstract.bind(this);
    this.closeAbstract = this.closeAbstract.bind(this);
  }
  openAbstract() {
    this.setState({ showAbstract: true });
  }
  closeAbstract() {
    this.setState({ showAbstract: false });
  }
  openBibtex() {
    this.props.fetchBibtex()
    this.setState({ showModal: true })
  }
  closeBibtex() {
    this.props.clearBibtex()
    this.setState({ showModal: false })
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

  render() {
    const { authors, conferences, downloadLink, title, doi, frequency } = this.props.article
    const { bibtex } = this.props.bibtexData.bibtex
    const { abstract } = this.props.abstractData.abstract
    const { word } = this.props
    const { showAbstract, showModal } = this.state
    const mappedAuthors = authors.map((author, i) =>
      <IndexLink to="/" key={i} onClick={this.authorRoute.bind(this, author)}>
				{!!i && ', '}
				{author}
      </IndexLink>
		)

    return (
      <div className="container" id="article-container">

        <div className="row">
          <div>
            <ReactBootstrap.Modal show={showModal} onHide={this.closeBibtex}>
              <ReactBootstrap.Modal.Header closeButton>
                <ReactBootstrap.Modal.Title>BibTeX</ReactBootstrap.Modal.Title>
              </ReactBootstrap.Modal.Header>
              <ReactBootstrap.Modal.Body>
                <pre className="article-modal-pre">{bibtex}</pre>
              </ReactBootstrap.Modal.Body>
            </ReactBootstrap.Modal>
          </div>
        </div>

        <div className="row">
          <div>
            <ReactBootstrap.Modal show={showAbstract} onHide={this.closeAbstract}>
              <ReactBootstrap.Modal.Header closeButton>
                <ReactBootstrap.Modal.Title>Abstract</ReactBootstrap.Modal.Title>
              </ReactBootstrap.Modal.Header>
              <ReactBootstrap.Modal.Body>
                <pre className="article-modal-pre">
                  <Highlight search={word} matchStyle={{ backgroundColor: '#ffd54f' }}>
                    {abstract}
                  </Highlight>
                </pre>
                <a target="_blank" href={downloadLink}>
                  <button className="btn btn-primary" id="article-download-button">
                    <span className="glyphicon glyphicon-download"></span> Download
                  </button>
                </a>
              </ReactBootstrap.Modal.Body>
            </ReactBootstrap.Modal>
          </div>
        </div>

        <div className="row" id="article-title-container">
          <table>
            <tr>
              <th className="article-checkbox-col">
                <input type="checkbox" ref={doi} value=false id="article-checkbox" />
              </th>
              <th className="article-title-col">
                <a onClick={this.openAbstract}><p id="article-title">{title}</p></a>
              </th>
            </tr>
          </table>
        </div>

        <div className="row" id="article-authors-container">
          <span id="article-occurences-1">{word}: </span>
          <span id="article-occurences-2">Occurs </span>
          <span id="article-occurences-1">{frequency} </span>
          <span id="article-occurences-2">times.</span>
        </div>

        <div className="row" id="article-authors-container">
          <span id="article-authors">Authors: </span>
					{mappedAuthors}
        </div>

        <div className="row" id="article-authors-container">
          <span id="article-conferences">Conferences: </span>
					{conferences}
        </div>

        <div className="row" id="article-buttons-container">
          <button className="btn btn-primary" id="article-bibtex-button" onClick={this.openBibtex}>
            <span className="glyphicon glyphicon-book"></span> BibTeX
          </button>
          <a target="_blank" href={downloadLink}>
            <button className="btn btn-primary" id="article-download-button">
              <span className="glyphicon glyphicon-download"></span> Download
            </button>
          </a>
        </div>

      </div>
	  )
   }
}










	render() {
	  const { bibtex } = this.props;
      const { authors, conferences, downloadLink, title, doi, frequency } = this.props.article
      const { bibtex } = this.props.bibtexData.bibtex
      const { word } = this.props
      const mappedAuthors = authors.map((author, i) =>
      <IndexLink to="/" key={i} onClick={this.authorRoute.bind(this, author)}>
				{!!i && ', '}
				{author}
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
                <pre className="article-modal-pre">{bibtex}</pre>
              </ReactBootstrap.Modal.Body>
            </ReactBootstrap.Modal>
          </div>
        </div>

				{/* BibTeX popup */}
				<div className="row">
					<div>
						<ReactBootstrap.Modal show={this.state.showAbstract} onHide={this.closeAbstract}>
							<ReactBootstrap.Modal.Header closeButton className="bibtex-header">
								<ReactBootstrap.Modal.Title>Abstract</ReactBootstrap.Modal.Title>
							</ReactBootstrap.Modal.Header>
							<ReactBootstrap.Modal.Body className="bibtex-body">
								<pre >"Abstract"
								</pre>
							</ReactBootstrap.Modal.Body>
						</ReactBootstrap.Modal>
					</div>
				</div>

				{/* Article Checkbox */}
				<div className="row" id="article-title-container">
					<input type="checkbox" value="" id="article-checkbox"/>
					<a onClick={this.openAbstract}><p id="article-title">Robust principal component analysis?</p></a>
				</div>

				{/* Article Title */}
				<div className="row" id="article-authors-container">
					<p id="article-authors"><a href="#">Emmanuel J. Candès</a>, <a href="#">Xiaodong Li</a>, <a href="#">Yi Ma</a>, <a href="#">John Wright</a></p>
				</div>


		{/* Buttons */}
        <div className="row" id="article-buttons-container">
          <button className="btn btn-primary" id="article-bibtex-button" onClick={this.openBibtex}>
            <span className="glyphicon glyphicon-book"></span> BibTeX
          </button>
          <a target="_blank" href={downloadLink}>
            <button className="btn btn-primary" id="article-download-button">
              <span className="glyphicon glyphicon-download"></span> Download
            </button>
          </a>
        </div>
			</div>
		);
	}
}