import React from 'react';
import * as ReactBootstrap from 'react-bootstrap'
import '../../../dev/styles/article-item.sass';

export default class ArticleItem extends React.Component {
	constructor(props) {
    super(props);
    this.state = {
      showModal: false,
      bibtex:  
`@articleCandes:2011:RPC:1970392.1970395,
author = Cand\es, Emmanuel J. and Li, Xiaodong and Ma, Yi and Wright, John,
title = Robust Principal Component Analysis?,
journal = J. ACM,
issue_date = May 2011,
volume = 58,
number = 3,
month = un,
year = 2011,
issn = 0004-5411,
pages = 11:1--11:37,
articleno = 11,
numpages = 37,
url = http://doi.acm.org/10.1145/1970392.1970395,
doi = 10.1145/1970392.1970395,
acmid = 1970395,
publisher = ACM,
address = New York, NY, USA,`
    };
    this.openBibtex = this.openBibtex.bind(this);
    this.closeBibtex = this.closeBibtex.bind(this);
  }
  getInitialState() {
    return { showModal: false };
  }
  closeBibtex() {
    this.setState({ showModal: false });
  }
  openBibtex() {
    this.setState({ showModal: true });
  }
	render() {


		return (
      <div className="container" id="article-container">

				{/* BibTeX popup */}
				<div className="row">
					<div>
						<ReactBootstrap.Modal show={this.state.showModal} onHide={this.closeBibtex}>
							<ReactBootstrap.Modal.Header closeButton className="bibtex-header">
								<ReactBootstrap.Modal.Title>BibTeX</ReactBootstrap.Modal.Title>
							</ReactBootstrap.Modal.Header>
							<ReactBootstrap.Modal.Body className="bibtex-body">
								<pre >{this.state.bibtex}
								</pre>
							</ReactBootstrap.Modal.Body>
						</ReactBootstrap.Modal>
					</div>
				</div>

				{/* Article Checkbox */}
				<div className="row" id="article-title-container">
					<input type="checkbox" value="" id="article-checkbox"/>
					<p id="article-title">Robust principal component analysis?</p>
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
					<button className="btn btn-primary" id="article-download-button">
						<span className="glyphicon glyphicon-download"></span> Download
					</button>
				</div>
			</div>
		);
	}
}